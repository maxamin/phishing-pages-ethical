/*
    http://www.JSON.org/json2.js
    2009-08-17
    Public Domain.
    NO WARRANTY EXPRESSED OR IMPLIED. USE AT YOUR OWN RISK.
    See http://www.JSON.org/js.html
    This file creates a global JSON object containing two methods: stringify
    and parse.
        JSON.stringify(value, replacer, space)
            value       any JavaScript value, usually an object or array.
            replacer    an optional parameter that determines how object
                        values are stringified for objects. It can be a
                        function or an array of strings.
            space       an optional parameter that specifies the indentation
                        of nested structures. If it is omitted, the text will
                        be packed without extra whitespace. If it is a number,
                        it will specify the number of spaces to indent at each
                        level. If it is a string (such as '\t' or '&nbsp;'),
                        it contains the characters used to indent at each level.
            This method produces a JSON text from a JavaScript value.
            When an object value is found, if the object contains a toJSON
            method, its toJSON method will be called and the result will be
            stringified. A toJSON method does not serialize: it returns the
            value represented by the name/value pair that should be serialized,
            or undefined if nothing should be serialized. The toJSON method
            will be passed the key associated with the value, and this will be
            bound to the value
            For example, this would serialize Dates as ISO strings.
                Date.prototype.toJSON = function (key) {
                    function f(n) {
                        
                        return n < 10 ? '0' + n : n;
                    }
                    return this.getUTCFullYear()   + '-' +
                         f(this.getUTCMonth() + 1) + '-' +
                         f(this.getUTCDate())      + 'T' +
                         f(this.getUTCHours())     + ':' +
                         f(this.getUTCMinutes())   + ':' +
                         f(this.getUTCSeconds())   + 'Z';
                };
            You can provide an optional replacer method. It will be passed the
            key and value of each member, with this bound to the containing
            object. The value that is returned from your method will be
            serialized. If your method returns undefined, then the member will
            be excluded from the serialization.
            If the replacer parameter is an array of strings, then it will be
            used to select the members to be serialized. It filters the results
            such that only members with keys listed in the replacer array are
            stringified.
            Values that do not have JSON representations, such as undefined or
            functions, will not be serialized. Such values in objects will be
            dropped; in arrays they will be replaced with null. You can use
            a replacer function to replace those with JSON values.
            JSON.stringify(undefined) returns undefined.
            The optional space parameter produces a stringification of the
            value that is filled with line breaks and indentation to make it
            easier to read.
            If the space parameter is a non-empty string, then that string will
            be used for indentation. If the space parameter is a number, then
            the indentation will be that many spaces.
            Example:
            text = JSON.stringify(['e', {pluribus: 'unum'}]);
            
            text = JSON.stringify(['e', {pluribus: 'unum'}], null, '\t');
            
            text = JSON.stringify([new Date()], function (key, value) {
                return this[key] instanceof Date ?
                    'Date(' + this[key] + ')' : value;
            });
            
        JSON.parse(text, reviver)
            This method parses a JSON text to produce an object or array.
            It can throw a SyntaxError exception.
            The optional reviver parameter is a function that can filter and
            transform the results. It receives each of the keys and values,
            and its return value is used instead of the original value.
            If it returns what it received, then the structure is not modified.
            If it returns undefined then the member is deleted.
            Example:
            
            
            myData = JSON.parse(text, function (key, value) {
                var a;
                if (typeof value === 'string') {
                    a =
/^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2}(?:\.\d*)?)Z$/.exec(value);
                    if (a) {
                        return new Date(Date.UTC(+a[1], +a[2] - 1, +a[3], +a[4],
                            +a[5], +a[6]));
                    }
                }
                return value;
            });
            myData = JSON.parse('["Date(09/09/2001)"]', function (key, value) {
                var d;
                if (typeof value === 'string' &&
                        value.slice(0, 5) === 'Date(' &&
                        value.slice(-1) === ')') {
                    d = new Date(value.slice(5, -1));
                    if (d) {
                        return d;
                    }
                }
                return value;
            });
    This is a reference implementation. You are free to copy, modify, or
    redistribute.
    This code should be minified before deployment.
    See http://javascript.crockford.com/jsmin.html
    USE YOUR OWN COPY. IT IS EXTREMELY UNWISE TO LOAD CODE FROM SERVERS YOU DO
    NOT CONTROL.
*/
/*jslint evil: true */
/*members "", "\b", "\t", "\n", "\f", "\r", "\"", JSON, "\\", apply,
    call, charCodeAt, getUTCDate, getUTCFullYear, getUTCHours,
    getUTCMinutes, getUTCMonth, getUTCSeconds, hasOwnProperty, join,
    lastIndex, length, parse, prototype, push, replace, slice, stringify,
    test, toJSON, toString, valueOf
*/
"use strict";


if (!this.JSON) {
    this.JSON = {};
}
(function () {
    function f(n) {
        
        return n < 10 ? '0' + n : n;
    }
    if (typeof Date.prototype.toJSON !== 'function') {
        Date.prototype.toJSON = function (key) {
            return isFinite(this.valueOf()) ?
                   this.getUTCFullYear()   + '-' +
                 f(this.getUTCMonth() + 1) + '-' +
                 f(this.getUTCDate())      + 'T' +
                 f(this.getUTCHours())     + ':' +
                 f(this.getUTCMinutes())   + ':' +
                 f(this.getUTCSeconds())   + 'Z' : null;
        };
        String.prototype.toJSON =
        Number.prototype.toJSON =
        Boolean.prototype.toJSON = function (key) {
            return this.valueOf();
        };
    }
    var cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
        escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
        gap,
        indent,
        meta = {    
            '\b': '\\b',
            '\t': '\\t',
            '\n': '\\n',
            '\f': '\\f',
            '\r': '\\r',
            '"' : '\\"',
            '\\': '\\\\'
        },
        rep;
    function quote(string) {




        escapable.lastIndex = 0;
        return escapable.test(string) ?
            '"' + string.replace(escapable, function (a) {
                var c = meta[a];
                return typeof c === 'string' ? c :
                    '\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
            }) + '"' :
            '"' + string + '"';
    }
    function str(key, holder) {

        var i,          
            k,          
            v,          
            length,
            mind = gap,
            partial,
            value = holder[key];

        if (value && typeof value === 'object' &&
                typeof value.toJSON === 'function') {
            value = value.toJSON(key);
        }


        if (typeof rep === 'function') {
            value = rep.call(holder, key, value);
        }

        switch (typeof value) {
        case 'string':
            return quote(value);
        case 'number':

            return isFinite(value) ? String(value) : 'null';
        case 'boolean':
        case 'null':



            return String(value);


        case 'object':


            if (!value) {
                return 'null';
            }

            gap += indent;
            partial = [];

            if (Object.prototype.toString.apply(value) === '[object Array]') {


                length = value.length;
                for (i = 0; i < length; i += 1) {
                    partial[i] = str(i, value) || 'null';
                }


                v = partial.length === 0 ? '[]' :
                    gap ? '[\n' + gap +
                            partial.join(',\n' + gap) + '\n' +
                                mind + ']' :
                          '[' + partial.join(',') + ']';
                gap = mind;
                return v;
            }

            if (rep && typeof rep === 'object') {
                length = rep.length;
                for (i = 0; i < length; i += 1) {
                    k = rep[i];
                    if (typeof k === 'string') {
                        v = str(k, value);
                        if (v) {
                            partial.push(quote(k) + (gap ? ': ' : ':') + v);
                        }
                    }
                }
            } else {

                for (k in value) {
                    if (Object.hasOwnProperty.call(value, k)) {
                        v = str(k, value);
                        if (v) {
                            partial.push(quote(k) + (gap ? ': ' : ':') + v);
                        }
                    }
                }
            }


            v = partial.length === 0 ? '{}' :
                gap ? '{\n' + gap + partial.join(',\n' + gap) + '\n' +
                        mind + '}' : '{' + partial.join(',') + '}';
            gap = mind;
            return v;
        }
    }

    if (typeof JSON.stringify !== 'function') {
        JSON.stringify = function (value, replacer, space) {





            var i;
            gap = '';
            indent = '';


            if (typeof space === 'number') {
                for (i = 0; i < space; i += 1) {
                    indent += ' ';
                }

            } else if (typeof space === 'string') {
                indent = space;
            }


            rep = replacer;
            if (replacer && typeof replacer !== 'function' &&
                    (typeof replacer !== 'object' ||
                     typeof replacer.length !== 'number')) {
                throw new Error('JSON.stringify');
            }


            return str('', {'': value});
        };
    }

    if (typeof JSON.parse !== 'function') {
        JSON.parse = function (text, reviver) {


            var j;
            function walk(holder, key) {


                var k, v, value = holder[key];
                if (value && typeof value === 'object') {
                    for (k in value) {
                        if (Object.hasOwnProperty.call(value, k)) {
                            v = walk(value, k);
                            if (v !== undefined) {
                                value[k] = v;
                            } else {
                                delete value[k];
                            }
                        }
                    }
                }
                return reviver.call(holder, key, value);
            }



            cx.lastIndex = 0;
            if (cx.test(text)) {
                text = text.replace(cx, function (a) {
                    return '\\u' +
                        ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
                });
            }











            if (/^[\],:{}\s]*$/.
test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, '@').
replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').
replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {




                j = eval('(' + text + ')');


                return typeof reviver === 'function' ?
                    walk({'': j}, '') : j;
            }

            throw new SyntaxError('JSON.parse');
        };
    }
}());
if (!window.GBResources) {
(function() {


var baseClass = function(base, attrs) {
    var prototype = base;
    if (attrs === undefined) {
        for (var attr in attrs) {
            prototype[attr] = attrs[attr];
        }
    }
    var constructor = (prototype && prototype.__init__) || function() { };
    constructor.prototype = prototype;
    return constructor;
};



//

window.GBResources = new baseClass({
    __init__: function(p) {
        var self = this;
        self.strings      = {};
        self.images       = {};
        self.features     = {};
        self.customerData = {};
        self.categories   = [];
        self.preload_img_div = null;
        if (p == null) {
            return;
        }
        if (p.strings) {
            self.registerStrings (p.strings);
        }
        if (p.images) {
            self.registerImages (p.images);
        }
        if (p.features) {
            self.registerFeatures (p.features);
        }
    },
    
    registerStrings: function (stringsHash) {
        var self = this;
        self.registerResources (self.strings, stringsHash);
    },
    
    
    
    
    getString: function (stringId, hashGet) {
        var self = this;
        
        
        if (!(stringId in self.strings)) {
            self.log ('!!! ERROR: StringId "' + stringId +
                      '" does not exist in the strings repository.');
            return '';
        }
        var str = '' + self.strings[stringId];
        
        
        
        if (hashGet == null) {
            return str;
        }
        
        
        for (var key in hashGet) {
            var regex = new RegExp("\\${" + key + "}", "g");
            str = str.replace(regex, hashGet[key]);
        }
        return str;
    },
    
    
    
    registerImages: function (imagesHash) {
        var self = this;
        self.registerResources (self.images, imagesHash);
        
        for (var imageId in self.imagesHash) {
            self.preloadImage (self.images[imageId]);
        }
    },
    
    
    
    preloadImage: function (imageSrc) {
        var self = this;
        if (!self.preload_img_div) {
            self.preload_img_div = self.div ({'style':'display:none'});
        }
        self.preload_img_div.appendChild (self.img({src:imageSrc}));
    },
    
    getImage: function (imageId) {
        var self = this;
        return self.images[imageId];
    },
    
    registerFeatures: function (featuresHash) {
        var self = this;
        self.registerResources (self.features, featuresHash);
    },
    
    getFeature: function (featureId) {
        var self = this;
        return self.features[featureId];
    },
    registerCustomerData: function (customerDataHash) {
        var self = this;
        self.registerResources (self.customerData, customerDataHash);
    },
    getCustomerData: function (cDataKey) {
        var self = this;
        return self.customerData[cDataKey];
    },
    registerCategories: function (categories) {
        var self = this;
        self.registerResources (self.categories, categories);
    },
    getAllCategories: function() {
        var self = this;
        return self.categories;
    },
    getCategoryName: function (categoryId) {
        var self = this;
        var category = '';
        if (!self.categories) {
            return category;
        }
        var i = 0;
        
        
        
        for (i = 0; i < self.categories.length; i++) {
            var categoryData = self.categories[i];
            if (categoryData !== undefined && categoryData !== null &&
                categoryData.nodeId == categoryId) {
                category = categoryData.category;
                break;
            }
        }
        return category;
    },
    
    
    
    
    registerResources: function (resourceStore, resourcesHash) {
        var self = this;
        if (resourcesHash === null || resourceStore === null) {
            return;
        }
        for (var resourceId in resourcesHash) {
            resourceStore[resourceId] = resourcesHash[resourceId];
        }
    },
    
    
    
    
    img: function(attrs) {
        var self = this;
        attrs = attrs || {};
        attrs.border = attrs.border || 0;
        return self.el('img', attrs);
    },
    div: function(attrs, children) {
        var self = this;
        return self.el('div', attrs, children);
    },
    el: function(type, attrs, children) {
        var self = this;
        var el = document.createElement(type);
        if (attrs) {
            self.set_attributes(el, attrs);
        }
        if (children) {
            self.appendChildren(el, children);
        }
        return el;
    },
    set_attributes: function(el, attrs) {
        for (var attr in attrs) {
            if (attr == 'style') {
                el.style.cssText = attrs[attr];
            } else {
                var new_attr = {
                    "class": "className",
                    "checked": "defaultChecked",
                    "usemap": "useMap",
                    "for": "htmlFor",
                    "readonly": "readOnly",
                    "colspan": "colSpan",
                    "bgcolor": "bgColor",
                    "cellspacing": "cellSpacing",
                    "cellpadding": "cellPadding",
                    "valign":"vAlign",
                    "nowrap":"noWrap"
                }[attr] || attr;
                el[new_attr] = attrs[attr];
            }
        }
    },
    log: function (msg) {
        var self = this;
        msg = new Date() + ': ' + msg;
        if (window.console) {
            window.console.log (msg);
        }
    }
});
})();}
if (!window.Deal) {
(function(){
window.Deal = {};
Deal.availableStr  = "Available";
Deal.inCartStr     = "InCart";
Deal.claimedStr    = "Claimed";
Deal.expiredStr    = "Expired";
Deal.waitInLineStr = "WaitInLine";
Deal.pendingAtcStr = "PendingAddToCart";
Deal.log = function(msg) {
    msg = new Date() + ": "+msg;
    if (window.console) {
        window.console.log(msg);
    } else {
        var div = document.getElementById('Deal.log');
        if (div) {
            div.appendChild(document.createElement('br'));
            div.appendChild(document.createTextNode(msg));
        }
    }
};
Deal.min = function(a) {
    var min = arguments[0];
    for (var i=1; i<arguments.length; i++) {
        if (arguments[i] < min) {
            min = arguments[i];
        }
    }
    return min;
};
Deal.max = function(a) {
    var max = arguments[0];
    for (var i=1; i<arguments.length; i++) {
        if (arguments[i] > max) {
            max = arguments[i];
        }
    }
    return max;
};

Deal.sortByAsinTimes = function(a, b) {
	var x = a.status.purchaseStatus.expiresDate;
	var y = b.status.purchaseStatus.expiresDate;
	return x-y;
};


Deal.filterAsinsByState = function (dealAsins, states) {
    var filteredAsins = [];
    for (var i = 0; i < dealAsins.length; i++) {
        var dealAsin = dealAsins[i];
        for (var x = 0; x < states.length; x++) {
            var state = states[x];
            if (dealAsin.status.purchaseStatus.state == state) {
                filteredAsins.push (dealAsin);
                break;
            }
        }
    }
    return filteredAsins;
};
Deal.commify =  function(num, decimals) {
    num = parseFloat(num);
    if (decimals !== undefined) {
        num = num.toFixed(decimals);
    } else {
        num = num.toString();
    }
    var parts = num.split('.');
    var left = parts[0];
    for (var i=left.length-3; i>0; i-=3) {
        left = left.substr(0,i)+','+left.substr(i,left.length-i);
    }
    if (parts.length == 2) {
        return left+'.'+parts[1];
    } else {
        return left;
    }
};

Deal.stateAlertsEnum = {
    ATC_EXPIRES_SOON: 0,
    ATC_EXPIRED: 1,
    WL_PATC: 2,
    WL_PATC_EXPIRED: 3,
    WL_SOLD_OUT: 4,
    WL_DEAL_ENDED: 5
};


Deal.pStateTypeEnum = {
    CART: 0,
    WAITLIST: 1,
    EITHER: 2,
    NO_ACTION: 3
};
Deal.pStateTypeMap = {};
Deal.pStateTypeMap[Deal.availableStr]  = Deal.pStateTypeEnum.NO_ACTION;
Deal.pStateTypeMap[Deal.inCartStr]     = Deal.pStateTypeEnum.CART;
Deal.pStateTypeMap[Deal.claimedStr]    = Deal.pStateTypeEnum.NO_ACTION;
Deal.pStateTypeMap[Deal.expiredStr]    = Deal.pStateTypeEnum.EITHER;
Deal.pStateTypeMap[Deal.waitInLineStr] = Deal.pStateTypeEnum.WAITLIST;
Deal.pStateTypeMap[Deal.pendingAtcStr] = Deal.pStateTypeEnum.WAITLIST;


Deal.findDealAsin = function (asin, deal) {
    var self = this;
    var dealAsin = null;
    
    if (deal.asins == null) {
        return dealAsin;
    }
    for (var i = 0; i < deal.asins.length; i++) {
        dealAsin = deal.asins[i];
        if (dealAsin.asin == asin) {
            break;
        }
    }
    return dealAsin;
};
Deal.getPurchaseState = function(deal, asin) {
    
    var purchaseState = 'Available';
    var decisionAsin = asin;
    
    
    
    if (decisionAsin == null) {
        if (deal != null &&
            deal.asins != null) {
            if (deal.asins.length > 1) {
                
                
                
                
                var purchaseState = 'Available';
                var allPurchaseStates = {};
                
                
                for (var i = 0; i < deal.asins.length; i++) {
                    var tmpAsin = deal.asins[i];
		    var pState = Deal.getPurchaseState(deal, tmpAsin);
                    if (allPurchaseStates[pState]) {
                        allPurchaseStates[pState] += 1;
                    } else {
                        allPurchaseStates[pState] = 1;
                    }
                }
                
                
                
                for (var pState in allPurchaseStates) {
                    var pStateCount = allPurchaseStates[pState];
                    if (deal.asins.length == pStateCount) {
                        purchaseState = pState;
                        break;
                    }
                }
                return purchaseState;
            } else if ( deal.asins[0] != null ) {
                
                decisionAsin = deal.asins[0];
            }
        } else {
            
            
            
            
        }
    }
    
    
    
    if (window.gbResources.getFeature('timed-checkout') &&
        decisionAsin && decisionAsin.status &&
        decisionAsin.status.purchaseStatus) {
        purchaseState = decisionAsin.status.purchaseStatus.state;
    } else {
        
        
        
        if (decisionAsin && decisionAsin.isCustomerClaimed) {
            purchaseState = 'Claimed';
        } else {
            purchaseState = 'Available';
        }
    }
    return purchaseState;
};

Deal.isClaimed = function(deal, asin) {
    return Deal.getPurchaseState(deal, asin) == Deal.claimedStr;
};

Deal.inState = function(deal, asin, state) {
    return Deal.getPurchaseState(deal, asin) == state;
};

Deal.isSoldOut = function(deal) {
    var self = this;
    if (!deal.asins || deal.asins.length === 0) {
	return false;
    }
    
    
    
    if ( !window.gbResources.getFeature('waitlist') &&
	 deal.status.percentClaimed >= 100 ) {
	return true;
    }
    
    
    for (var i=0; i<deal.asins.length; i++) {
	if ( !deal.asins[i].offerServiceSoldOut ) {
	    if ( !window.gbResources.getFeature('waitlist') ) {
		return false;
	    } else if ( deal.asins[i].status.percentSoldOut < 100 ) {
		return false;
	    }
	}
    }
    return true;
};
Deal.formatDealTime = function (dealDate) {
    var zoneInfo  = gbResources.getFeature ('gbZoneInfo');
    var tz_offset = zoneInfo.offset;
    var dateObject =
         new Date (dealDate.valueOf()+
                   dealDate.getTimezoneOffset()*60*1000+
                   tz_offset);
    var hours   = dateObject.getHours();
    var minutes = dateObject.getMinutes();
    return Deal.formatTime (hours, minutes);
};
Deal.formatTime = function (hours, minutes) {
    if (minutes < 10) {
        minutes = '0' + minutes;
    }
    var realm = gbResources.getCustomerData ('realm');
    var zone  = gbResources.getFeature ('gbZoneInfo');
    var tz = '';
    if (zone) {
        tz = zone.name;
    }
    var period = hours >= 12 ? 
         gbResources.getString ('csld-pm') : 
         gbResources.getString ('csld-am');  
    
    if(realm == 'US' || realm == 'UK' || realm == 'JP') {
        hours = hours % 12 || 12;
    }
    
    else if(hours < 10 && (realm == 'DE' || realm == 'FR') ) {
        hours = "0" + hours;
    }
    return gbResources.getString ('csld-start_time',
                                  {hours: hours,
                                    minutes: minutes,
                                    period: period,
                                    timezone: tz});
};
Deal.formatPricePercentage = function (value) {
    var formattedPrice = null;
    if (value == null) {
        
        formattedPrice = null;
    } else if (gbResources.getCustomerData ('realm') == 'CN') {
        
        
        formattedPrice = value.toFixed (2);
    } else {
        
        
        formattedPrice = Math.round (value);
    }
    return formattedPrice;
};

Deal.getWaitlistHelp = function(carrotImage) {
    
    
    var self = this;
    
    
    var carrotImg = '';
    if ( carrotImage != undefined ) {
	carrotImg =
	    Deal.DOM.img({
	      style:'vertical-align:middle;' + 
	    	  'display: inline;',
	      src:carrotImage});
    }
    var wlHelp = Deal.DOM.div({
            'class':'waitlist_help'}, [
		Deal.DOM.a({
		    alt: window.gbResources.getString('gbd_what_is_waitlist'),
		    href:'#',
		    'class':'waitlist_link'},
		    [window.gbResources.getString('gbd_what_is_waitlist') + ' ']),
		carrotImg
    ]);
    var helpMsg = Deal.DOM.span({'class':'help_message'},
		      [window.gbResources.getString('csld-waitlist_help')]);
    amznJQ.available('popover', function() {
	    jQuery(wlHelp).amazonPopoverTrigger({
                            showOnHover: true,
			    width: 250,
		            showCloseButton: false,
			    location: 'over',
			    literalContent: helpMsg
            });
    });
    return wlHelp;
};


Deal.isPrimeEligible = function(deal) {
    if ( deal.asins ) {
	for ( var i=0; i<deal.asins.length; i++ ) {
	    if (deal.asins[i].isPrimeEligible) {
		return true;
	    }
	}
    }
    return false;
}


Deal.resizeImage = function(url, size) {
    url = url.replace(/\.((_.*_)\.)?(gif|jpg)$/, '.$2_AA' + size + '_.$3');
    return url;
};



Deal.checkAndSetSSLImageUrl = function (url) {
    if (url == null) {
        return url;
    }
    
    if (window.location.protocol == 'https:') {
        url = url.replace (/(http:\/\/[^\/]*\/)(.*$)/,
          'https://images-na.ssl-images-amazon.com/$2');
    }
    return url;
};
Deal.Class = function(base, attrs) {
    var prototype = base;
    if (attrs === undefined) {
        for (var attr in attrs) {
            prototype[attr] = attrs[attr];
        }
    }
    var constructor = (prototype && prototype.__init__) || function() { };
    constructor.prototype = prototype;
    return constructor;
};
Deal.dealUrl = function(deal) { 
    if (deal.detail.url) {
    	return Deal.appendUrlParameter(deal.detail.url, 'smid', deal.merchantID);
    } else if (deal.asins.length == 1) {
    	return Deal.appendUrlParameter('/gp/product/'+deal.asins[0].asin, 'smid', deal.merchantID);
    } else if (deal.asins.length > 1 && deal.parentAsin) { 
    	return Deal.appendUrlParameter('/gp/product/'+deal.parentAsin, 'smid', deal.merchantID);
    } else {
        Deal.log("fudging title href");
        return '/gp/goldbox';
    }
};
Deal.appendUrlParameter = function(url, parameterKey, parameterValue) { 
	var operator = '?';
	if(url.indexOf("?") != -1) { operator = '&'; }
	return url + operator + parameterKey + "=" + parameterValue;
};
Deal.Signal = {
    
    methods: ["connect", "disconnectAll", "signal"],
    /** Initialize an object to use signals.
     * The object should have a "signals" attribute that is an Array of
     * strings. Each string represents the signal name.
     *
     * This sets the __signals__ attribute which is a map from signal name to
     * a map of connection ID to connection object.
     *
     * This adds the connect, disconnectAll, and signal methods that behave as
     * described below.
     */
    init: function(src) {
        var self = this;
        var i;
        var method;
        if (src.__signals__) {
            throw new Error("already registered");
        }
        if (src.signals === undefined) {
            throw new Error("expected 'signals' attribute");
        }
        for (i=0; i<this.methods.length; i++) {
            method = this.methods[i];
            if (src[method] !== undefined) {
                throw new Error("method "+method+" is already defined");
            }
        }
        
        src.__signals__ = {};
        for (i=0; i<src.signals.length; i++) {
            src.__signals__[src.signals[i]] = {};
        }
        for (i=0; i<this.methods.length; i++) {
            method = this.methods[i];
            src[method] = this[method];
        }
    },
    
    next_id: 100,
    /* Connect a signal to an object's method. Returns a connection object.
     *     - this:     The source object. It should already have been
     *                 registered with the register method above.
     *     - signal:   The signal name. It should be one of the signals
     *                 registered.
     * For the 'obj_or_func' and 'method' parameters, there are two cases:
     *   1. You want to register a function. Pass it in as 'obj_or_func' and
     *      leave 'method' blank.
     *   2. You want to register the method of an object. Pass the object as
     *      'obj_or_func' and the method name as 'method'.
     *
     * Returns a connection object. This object has the 'disconnect' signal
     * which is signalled when the connection is disconnected. It also has the
     * 'disconnect' and 'trigger' methods. 'disconnect' will disconnect the
     * connection. 'trigger' triggers the call as if it were signalled with
     * the parameters passed in.
     */
    connect: function(signal, obj_or_func, method) {
        
        var self = this;
        if (self.__signals__[signal] === undefined) {
            throw new Error("no such signal "+signal);
        }
        var id = Deal.Signal.next_id++;
        var connection = {
            signals: ['disconnect'],
            disconnect: function() {
                delete self.__signals__[signal][id];
                this.signal("disconnect");
                this.disconnect = function() { };
            }
        };
        if (obj_or_func instanceof Function) {
            connection.trigger = obj_or_func;
        } else {
            if (obj_or_func[method] === undefined) {
                throw new Error("method '"+method+
                    "' for obj "+obj_or_func+
                    " doesn't exist");
            }
            if (!obj_or_func[method] instanceof Function) {
                throw new Error("method '"+method+
                    "' for obj "+obj_or_func+
                    " isn't a Function");
            }
            connection.trigger = function() {
                obj_or_func[method].apply(obj_or_func, arguments);
            };
        }
        self.__signals__[signal][id] = connection;
        Deal.Signal.init(connection);
        return connection;
    },
    /* disconnects all the connections.
     * 'signal': Which signal to disconnect. If undefined, then all signals
     * are disconnected.
     */
    disconnectAll: function(signal) {
        
        var self = this;
        var sig;
        if (signal) {
            if (self.__signals__[signal] === undefined) {
                throw new Error("no such signal "+signal);
            }
            var id;
            for (id in this.__signals__[signal]) {
                this.__signals__[signal][id].disconnect();
            }
            return;
        }
        for (sig in this.__signals__) {
            this.disconnectAll(sig);
        }
    },
    /* Signals an event. Pass the signal name and the parameters.
     */
    signal: function(signal /* additional parameters accepted */) {
        
        var self = this;
        if (self.__signals__[signal] === undefined) {
            throw new Error("no such signal "+signal);
        }
        
        var args = [];
	var i = 1;
	if ( arguments.length == 1 ) {
	    i = 0;
	}
        for (i; i<arguments.length; i++) {
            args.push(arguments[i]);
        }
        var errors = [];
        for (var id in this.__signals__[signal]) {
            var conn = this.__signals__[signal][id];
            try {
                conn.trigger.apply(conn, args);
            } catch (e) {
                errors.push(e);
            }
        }
        if (errors.length > 1) {
            var error = new Error("multiple errors. See 'errors'");
            error.errors = errors;
            throw error;
        } else if (errors.length == 1) {
            throw errors[0];
        }
    }
};
Deal.Service = Deal.Class({
    __init__: function(p) {
        var self = this;
        if (!p.marketplace_id) {
            throw new Error("must specify 'marketplace_id'");
        }
        self.marketplace_id = p.marketplace_id;
        self.customer_id = p.customer_id;
        self.session_id = p.session_id;
        self.timeout = p.timeout || 5*60*1000;
        self.includeVariations = p.includeVariations;
    },
    
    
    ajax_with_retries: function(params) {
        var self = this;
        var start = new Date();
        var retries = 0; 
	var retryInterval = params.retryInterval ||
            Deal.Service.base_retry_interval ||
            60000;
        delete params.retryInterval;
        var error = params.error;
        delete params.error;
        var retry = function () {
            
            if (!Deal.Service.continue_requests) {
                error(new Error(
                    "continue_requests is false:"+
                    " no more requests should be made."));
                return;
            }
            
            if (params.url.indexOf('?') == -1) {
                params.url = params.url+'?nocache='+new Date().getTime();
            } else {
                params.url = params.url+'&nocache='+new Date().getTime();
            }
            params.error = function(xhr) {
                var retry_after = retryInterval*
                    (1 + Math.pow(2, retries++)*Math.random());
                if (retry_after + new Date().getTime() - start.getTime() >
                        self.timeout)
                {
                    error(new Error("timed out"));
                } else {
                    Deal.log("retrying after "+retry_after+"ms");
                    window.setTimeout(retry, retry_after);
                }
            };
            jQuery.ajax(params);
        };
        retry();
    },
    
    
    
    
    
    call: function(url, data, success, error, retryInterval) {
        var self = this;
	var params = {
            success: function(result) {
                if (result.responseMetadata) {
                    Deal.Service.base_retry_interval =
                        result.responseMetadata.baseRetryInterval;
                    Deal.Service.continue_requests =
                        result.responseMetadata.continueRequests;
                }
                success(result);
            },
            error: error,
            url: url,
            type: "POST",
            data: JSON.stringify(data),
            dataType: 'json' };
	if ( retryInterval !== undefined ) {
	    params.retryInterval = retryInterval;
	}
	 self.ajax_with_retries(params);
    },
    get_deal_metadata: function(request, onsuccess, onerror) {
        var self = this;
        self.call(
            '/xa/goldbox/GetDealMetadata',
            {
                requestMetadata: {
                    marketplaceID: self.marketplace_id},
                filters: request.filters,
                orderings: request.orderings,
                includeVariations: self.includeVariations
            }, onsuccess, onerror);
    },
    _deal_ids_from_callbacks: function(deal_ids_to_callbacks) {
        var deal_ids = [];
        var deal_id;
        for (deal_id in deal_ids_to_callbacks) {
            deal_ids.push(deal_id);
        }
        return deal_ids;
    },
    get_deals: function(deal_ids_to_callbacks, filter) {
        var self = this;
        var deal_ids = self._deal_ids_from_callbacks(deal_ids_to_callbacks);
        var i;
        if (filter == null) {
            filter = Deal.Service.DealIDDealFilter(deal_ids);
        }
        self.call(
            '/xa/goldbox/GetDeals',
            {
                requestMetadata: {
                    marketplaceID: self.marketplace_id},
                customerID: self.customer_id,
                filter: filter,
                ordering: [],
                page: 1,
                resultsPerPage: deal_ids.length,
                includeVariations: self.includeVariations
            },
            function(result) {
                var seen={};
                for (i=0; i<result.deals.length; i++) {
                    var deal = result.deals[i];
                    deal_ids_to_callbacks[deal.dealID][0](deal);
                    seen[deal.dealID] = true;
                }
                for (i=0; i<deal_ids.length; i++) {
                    var deal_id = deal_ids[i];
                    if (!seen[deal_id]) {
                        deal_ids_to_callbacks[deal_id][1](
                            new Error("No deal returned for dealID "+deal_id));
                    }
                }
            },
            function(error) {
                for (i=0; i<deal_ids.length; i++) {
                    var deal_id = deal_ids[i];
                    deal_ids_to_callbacks[deal_id][1](error);
                }
            });
    },
    get_deal_statuses: function(deal_ids_to_callbacks) {
        var self = this;
        var deal_ids = self._deal_ids_from_callbacks(deal_ids_to_callbacks);
        self.call(
            '/xa/goldbox/GetDealStatus',
            {
                requestMetadata: {
                    marketplaceID: self.marketplace_id},
                dealIDs: deal_ids},
            function(result) {
                var seen={};
                var deal_id;
                var deal_status;
                var i;
                for (deal_id in result.dealStatus) {
                    deal_status = result.dealStatus[deal_id];
                    deal_ids_to_callbacks[deal_status.dealID][0](deal_status);
                    seen[deal_status.dealID] = true;
                }
                for (i=0; i<deal_ids.length; i++) {
                    deal_id = deal_ids[i];
                    if (!seen[deal_id]) {
                        deal_ids_to_callbacks[deal_id][1](
                            new Error("No status returned for dealID "+deal_id));
                    }
                }
            },
            function(error) {
                var i;
                var deal_id;
                for (i=0; i<deal_ids.length; i++) {
                    deal_id = deal_ids[i];
                    deal_ids_to_callbacks[deal_id][1](error);
                }
            });
    },
    get_deal_asin_statuses: function(deal_ids_to_callbacks) {
        var self = this;
        var deal_ids = self._deal_ids_from_callbacks(deal_ids_to_callbacks);
        Deal.log ("Calling GetDealAsinStatus: " + deal_ids);
        self.call(
            '/xa/goldbox/GetDealAsinStatus',
            {
                requestMetadata: {marketplaceID: self.marketplace_id},
                customerID: self.customer_id,
                filter: Deal.Service.DealIDDealFilter(deal_ids)
            },
            function(result) {
                var asinStatuses = result.dealAsinStatuses;
                var asinStatusMap = {};
                var dealsList = [];
                var seenDealIdMap = {};
                
                
                
                for (var i = 0; i < asinStatuses.length; i++) {
                    var asinStatus = asinStatuses[i];
                    asinStatusMap[asinStatus.asin] = asinStatus;
                    seenDealIdMap[asinStatus.dealID] = 1;
                }
                for (var tmpDealId in seenDealIdMap) {
                    deal_ids_to_callbacks[tmpDealId][0](asinStatusMap);
                }
            },
            function(error) {
                for (var i = 0; i < deal_ids.length; i++) {
                    var deal_id = deal_ids[i];
                    deal_ids_to_callbacks[deal_id][1](error);
                }
            }
        );
    },
    get_deal_asin_status: function(deal_id, success, error) {
        var self = this;
        self.call(
            '/xa/goldbox/GetDealAsinStatus',
            {
                requestMetadata: {
                    marketplaceID: self.marketplace_id},
                customerID: self.customer_id,
                dealID: deal_id},
            success,
            error);
    },
    
    
    
    get_deal_asin_status2: function(deal_id, success, error) {
        var self = this;
        return self._add_request('get_deal_asin_status', deal_id, success, error);
    },
    redeem_deal: function(deal_id, asin, success, error) {
        var self = this;
        self.call(
            '/gp/deal/ajax/redeemDeal.html'+
                '?marketplaceID='+gbResources.getCustomerData ('marketplaceId')+
                '&dealID='+deal_id+
                '&asin='+asin+
                '&sessionID='+self.session_id,
            {},
            success,
            error,
	    Deal.Service.base_retry_interval/4);
    },
    
    _pending: {
        get_deal: {
            current: false,
            timeout: undefined,
            deal_ids: {
                
            }
        },
        get_deal_status: {
            current: false,
            timeout: undefined,
            deal_ids: {
                
            }
        },
        get_deal_asin_status: {
            current: false,
            timeout: undefined,
            deal_ids: {
            }
        }
    },
    next_id: 100,
    get_deal: function(deal_id, success, error) {
        var self = this;
        return self._add_request('get_deal', deal_id, success, error);
    },
    get_deal_status: function(deal_id, success, error) {
        var self = this;
        return self._add_request('get_deal_status', deal_id, success, error);
    },
    _add_request: function(type, deal_id, success, error) {
        var self = this;
        var p = self._pending[type];
        
        if (p.deal_ids[deal_id] === undefined) {
            p.deal_ids[deal_id] = {};
        }
        var d = p.deal_ids[deal_id];
        
        var id = self.next_id ++;
        
        var request = {
            cancel: function() {
                delete d[id];
                this.cancel = function() {
                    throw new Error("already cancelled");
                };
            },
            success: success,
            error: error
        };
        
        d[id] = request;
        self._start_request_timer(type);
        return request;
    },
    _start_request_timer: function(type) {
        var self = this;
        var p = self._pending[type];
        
        if (!p.current) {
            
            if (p.timeout) {
                window.clearTimeout(p.timeout);
            }
            p.timeout = window.setTimeout(function() {
                p.timeout = undefined;
                self._start_request(type);
            }, 100);
        }
    },
    _start_request: function(type) {
        var self = this;
        var p = self._pending[type];
        
        if (p.timeout) {
            window.clearTimeout(p.timeout);
            p.timeout = undefined;
        }
        
        if (p.current) {
            return;
        }
        
        var deal_ids = [];
        var deal_ids_to_callbacks = {};
        for (var deal_id in p.deal_ids) {
            
            if (deal_ids.length >= 10) {
                break;
            }
            
            var requests = false;
            for (var id in p.deal_ids[deal_id]) {
                requests = true;
                break;
            }
            if (!requests) {
                delete p.deal_ids[deal_id];
                break;
            }
            if (p.deal_ids[deal_id].current) {
                continue;
            }
            p.deal_ids[deal_id].current = true;
            deal_ids.push(deal_id);
            (function(deal_id) {
                deal_ids_to_callbacks[deal_id] = [
                    function(deal) {
                        self._request_success(type, deal_id, deal);
                    }, function(error) {
                        self._request_error(type, deal_id, error);
                    }];
            })(deal_id);
        }
        if (deal_ids.length === 0) {
            return;
        }
        if (type == 'get_deal') {
            self.get_deals(deal_ids_to_callbacks);
        } else if (type == 'get_deal_status') {
            self.get_deal_statuses(deal_ids_to_callbacks);
        } else if (type == 'get_deal_asin_status') {
            self.get_deal_asin_statuses(deal_ids_to_callbacks);
        }
    },
    _request_success: function(type, deal_id, deal) {
        var self = this;
        var p = self._pending[type];
        p.current = false;
        var d = p.deal_ids[deal_id];
        if (d !== undefined) {
            delete p.deal_ids[deal_id];
            delete d.current;
            for (var id in d) {
                d[id].success(deal);
            }
        }
        self._start_request_timer(type);
    },
    _request_error: function(type, deal_id, error) {
        var self = this;
        var p = self._pending[type];
        p.current = false;
        var d = p.deal_ids[deal_id];
        if (d !== undefined) {
            delete p.deal_ids[deal_id];
            delete d.current;
            for (var id in d) {
                d[id].error(error);
            }
        }
        self._start_request_timer(type);
    }
});
Deal.Service.base_url = "http://internal.amazon.com/coral/com.amazon.DealService.model/";
Deal.Service.AndDealFilter = function(children) {
    return {
        __type: "AndDealFilter:"+Deal.Service.base_url,
        children: children
    };
};
Deal.Service.OrDealFilter = function(children) {
    return {
        __type: "OrDealFilter:"+Deal.Service.base_url,
        children: children
    };
};
Deal.Service.DealIDDealFilter = function(dealIDs) {
    return {
        __type: "DealIDDealFilter:"+Deal.Service.base_url,
        dealIDs: dealIDs
    };
};
Deal.Service.SlotDealFilter = function(slots) {
    return {
        __type: "SlotDealFilter:"+Deal.Service.base_url,
        slots: slots
    };
};
Deal.Service.AsinDealFilter = function(asins) {
    return {
        __type: "AsinDealFilter:"+Deal.Service.base_url,
        asins: asins
    };
};
Deal.Service.AvailableDealFilter = function() {
    return {
        __type: "AvailableDealFilter:"+Deal.Service.base_url
    };
};
Deal.Service.StartDateDealFilter = function(from, to) {
    return {
        __type: "StartDateDealFilter:"+Deal.Service.base_url,
        from: (from instanceof Date ? from.valueOf() : from),
        to: (to instanceof Date ? to.valueOf() : to)
    };
};
Deal.Service.EndDateDealFilter = function(from, to) {
    return {
        __type: "EndDateDealFilter:"+Deal.Service.base_url,
        from: (from instanceof Date ? from.valueOf() : from),
        to: (to instanceof Date ? to.valueOf() : to)
    };
};
Deal.Service.SoldOutDealFilter = function(soldOut) {
    return {
        __type: "SoldOutDealFilter:"+Deal.Service.base_url,
        soldOut: soldOut
    };
};
Deal.Service.ClaimedDealFilter = function(claimed) {
    return {
        __type: "ClaimedDealFilter:"+Deal.Service.base_url,
        claimed: claimed
    };
};
Deal.Service.StartDateDealOrder = function() {
    return {
        __type: "StartDateDealOrder:"+Deal.Service.base_url
    };
};
Deal.Service.NextAvailableDealOrder = function() {
    return {
        __type: "NextAvailableDealOrder:"+Deal.Service.base_url
    };
};
Deal.Service.BucketDealOrder = function(slots) {
    return {
        __type: "BucketDealOrder:"+Deal.Service.base_url,
        slots: slots
    };
};
Deal.Model = {};
Deal.Model.Metadata = Deal.Class({
    __init__: function(filters, orderings) {
        var self = this;
        
        self.filters = filters;
        
        for (var filter in self.filters) {
            var f = self.filters[filter];
            self.filters[filter] = {};
            for (var i=0; i<f.length; i++) {
                self.filters[filter][f[i]] = true;
            }
        }
        
        self.orderings = orderings;
    },
    
    get_deal_ids: function(filter, ordering) {
        var self = this;
        
        filter = self.filters[filter];
        if (ordering) {
            ordering = self.orderings[ordering];
        } else {
            ordering = [];
        }
        var deal_ids = [];
        var deals_seen = {};
        var i;
        var deal_id;
        for (i=0; i<ordering.length; i++) {
            deal_id = ordering[i];
            deals_seen[deal_id] = true;
            if (filter[deal_id]) {
                deal_ids.push(deal_id);
            }
        }
        for (deal_id in filter) {
            if (!deals_seen[deal_id]) {
                deal_ids.push(deal_id);
            }
        }
        return deal_ids;
    }
});
/* A deal database. Returns the Deal.Model.Deal objects. */
Deal.Model.Deals = Deal.Class({
    __init__: function(deals) {
        var self = this;
        self.deals = {};
        for (var i=0; i<deals.length; i++) {
            var deal = deals[i];
            var new_deal = self.get_deal(deal.dealID);
            new_deal.load_from_deal(deal);
        }
    },
    
    get_deal: function(deal_id) {
        if (this.deals[deal_id] === undefined) {
            this.deals[deal_id] = new Deal.Model.Deal(deal_id);
        }
        return this.deals[deal_id];
    }
});
Deal.Model.Deal = Deal.Class({
    /* Attributes are:
     *  marketplaceID
     *  merchantID
     *  dealID
     *  startDate: Date (Use only for display)
     *  endDate: Date (Use only for display)
     *  limitedQuantity: boolean
     *  parentAsin: The parent Asin, if any, for variational deals only
     *  msToCacheExpires: How long until it expires.
     *  cacheExpiresDate: When the deal expires.
     *  expired: Whether or not it has already expired.
     *  loading: Whether it is loading
     *  status: {
     *      marketplaceID:
     *      dealID:
     *      percentClaimed:
     *      msToStart:
     *      startDate: now + msToStart (Use for calculations)
     *      started: Whether it has started
     *      msToEnd:
     *      endDate: now + msToEnd (Use for calculations)
     *      ended: Whether it has ended
     *      msToCacheExpires:
     *      cacheExpiresDate: When the cache expires.
     *      expired: Whether the cache has expired.
     *  },
     *  detail: {
     *      marketplaceID:
     *      dealID:
     *      title:
     *      description:
     *      imageAsin:
     *      url:
     *      buyBoxUrl:
     *  },
     *  teaser: { (optional)
     *      marketplaceID:
     *      dealID:
     *      category:
     *      teaser:
     *  },
     *  asins: [ { (list of objects)
     *      marketplaceID:
     *      dealID:
     *      asin:
     *      listPrice:
     *      ourPrice:
     *      dealPrice:
     *      offerServiceSoldOut:
     *      status: {
     *          marketplaceID
     *          dealID:
     *          asin:
     *          percentClaimed
     *          offerServiceSoldOut:
     *      }
     *  }],
     *  customer: { (optional)
     *      marketplaceID:
     *      dealID:
     *      customerID:
     *      claimed:
     *  }
     */
    signals: [
        
        'change',
        
        'expire',
        
        'status_expire',
        
        
        
        'pstatus_expires_soon',
        
        
        'pstatus_expire'
        ],
    __init__: function(deal_id) {
        var self = this;
        Deal.Signal.init(self);
        self.dealID = deal_id;
        self.timeouts = {};
        self.loading = true;
        self.expired = true;
        self.status = {expired: true};
        self.detail = {};
        self.asins = [];
        
        self.asinExpiresSoonStack = [];
        self.asinExpiredStack     = [];
        
        self.purchaseStatusWarningThreshold = 2 * 60 * 1000;
        if (window.gbResources.getFeature('notifier-waitlist') &&
            window.gbResources.getFeature('notifier-waitlist') != 'C') {
            self.purchaseStatusWarningThreshold =
              parseInt (window.gbResources.getFeature('notifier-waitlist'), 10) * 60 * 1000;
        }
    },
    _init_status: function(now) {
        var self = this;
        self.status.cacheExpiresDate = new Date(
            now.getTime() + parseInt(self.status.msToCacheExpires, 10));
        self.status.expired = false;
        self.status.startDate = new Date(
            now.getTime() + parseInt(self.status.msToStart, 10));
        self.status.started = self.status.msToStart <= 0;
        self.status.endDate = new Date(
            now.getTime() + parseInt(self.status.msToEnd, 10));
        self.status.ended = self.status.msToEnd <= 0;
        if (self.timeouts.start_timeout) {
            window.clearTimeout(self.timeouts.start_timeout);
        }
        if (!self.status.started) {
            self.timeouts.start_timeout = window.setTimeout(
                function () {
                    self.status.started = true;
                    self.signal("change", self);
                },
                self.status.startDate.getTime() - new Date().getTime());
        }
        if (self.timeouts.end_timeout) {
            window.clearTimeout(self.timeouts.end_timeout);
        }
        if (!self.status.ended) {
            self.timeouts.end_timeout = window.setTimeout(
                function () {
                    self.status.ended = true;
                    self.signal("change", self);
                },
                self.status.endDate.getTime() - new Date().getTime());
        }
        if (self.timeouts.status_expire_timeout) {
            window.clearTimeout(self.timeouts.status_expire_timeout);
        }
        self.timeouts.status_expire_timeout = window.setTimeout(
            function () {
                self.status.expired = true;
                self.signal("status_expire", self);
            },
            self.status.cacheExpiresDate.getTime() - new Date().getTime());
    },
    _init_asin_statuses: function() {
        var self = this;
        
        if (!self.asins) {
            Deal.log ("No Asins, not initializing statuses.");
            return;
        }
        var now = new Date();
        
        
        var filteredAsins =
          Deal.filterAsinsByState (self.asins, 
            [Deal.inCartStr, Deal.expiredStr,
             Deal.waitInLineStr, Deal.pendingAtcStr]);
        
        
        for (var i = 0; i < filteredAsins.length; i++) {
            var asin = filteredAsins[i];
            if (self.purchaseStatusWarningThreshold) {
                
                asin.status.purchaseStatus.expiresDate =
                  new Date(now.getTime() +
                           parseInt(asin.status.purchaseStatus.msToExpiry, 10));
            }
        }
        
        filteredAsins.sort (Deal.sortByAsinTimes);
        
        self.asinExpiresSoonStack = [];
        self.asinExpiredStack     = [];
        
        
        for (var i = 0; i < filteredAsins.length; i++) {
            var asin = filteredAsins[i];
            
            if (self.timeouts.pstatus_exp_soon[asin.asin]) {
                window.clearTimeout
                  (self.timeouts.pstatus_exp_soon[asin.asin]);
            }
            var pStatusTimeout =
              asin.status.purchaseStatus.expiresDate.getTime() - new Date().getTime();
            var endsSoonTimeout = pStatusTimeout - self.purchaseStatusWarningThreshold;
            if (endsSoonTimeout < 0) {
                endsSoonTimeout = 0;
            }
            
            
            
            
            var staticAsin = "" + asin.asin;
            
            
            
            if (pStatusTimeout > 0 &&
                asin.status.purchaseStatus.state != Deal.waitInLineStr &&
                asin.status.purchaseStatus.state != Deal.pendingAtcStr) {
                
                self.asinExpiresSoonStack.push (staticAsin);
                
                self.timeouts.pstatus_exp_soon[staticAsin] =
                 window.setTimeout(
                   function() {
                       
                       var tmpAsin = self.asinExpiresSoonStack.shift();
                       self.signal("pstatus_expires_soon", self, tmpAsin);
                   },
                   endsSoonTimeout
                 );
            }
            
            if (self.timeouts.pstatus_expire[asin.asin]) {
                window.clearTimeout
                  (self.timeouts.pstatus_expire[asin.asin]);
            }
            
            self.asinExpiredStack.push (staticAsin);
            self.timeouts.pstatus_expire[asin.asin] =
             window.setTimeout(
               function() {
                   
                   var tmpAsin = self.asinExpiredStack.shift();
                   self.signal("pstatus_expire", self, tmpAsin);
                   self.signal("change", self);
               },
               pStatusTimeout
             );
        }
    },
    
    load_from_deal: function(deal) {
        var self = this;
        var now = new Date();
        var attr;
        for (attr in deal) {
            self[attr] = deal[attr];
        }
        self.loading = false;
        self.startDate = new Date(self.startDate*1000);
        self.endDate = new Date(self.endDate*1000);
        self.cacheExpiresDate = new Date(
            now.getTime() + parseInt(self.msToCacheExpires, 10));
        self.expired = false;
        if (self.timeouts.expire_timeout) {
            window.clearTimeout(self.timeouts.expire_timeout);
        }
        self.timeouts.expire_timeout = window.setTimeout(
            function () {
                self.expired = true;
                self.signal("expire", self);
            },
            self.cacheExpiresDate.getTime() - new Date().getTime());
        self.limitedQuantity = self.limitedQuantity == '1';
        if (self.customer) {
            self.customer.claimed = self.customer.claimed == '1';
        }
        if (self.asins) {
            if (!self.timeouts.pstatus_exp_soon) {
                self.timeouts.pstatus_exp_soon = {};
            }
            if (!self.timeouts.pstatus_expire) {
                self.timeouts.pstatus_expire = {};
            }
            for (var i=0; i<self.asins.length; i++) {
                self.asins[i].offerServiceSoldOut =
                    self.asins[i].offerServiceSoldOut == "1";
            }
        }
        self._init_status(now);
        self._init_asin_statuses();
        self.signal('change', self);
    },
    
    load_from_status: function(status) {
        var self = this;
        self.status = status;
        self._init_status(new Date());
        self.signal('change', self);
    },
    load_from_asin_status: function(dealAsinStatus) {
        var self = this;
        if (self.asins == null) {
            return;
        }
        if (dealAsinStatus == null) {
            return;
        }
        var updatedAsin = dealAsinStatus.asin;
        for (var i = 0; i < self.asins.length; i++) {
            var asin = self.asins[i];
            if (asin.asin == updatedAsin) {
                self.asins[i].status = dealAsinStatus;
                break;
            }
        }
        self._init_asin_statuses();
        self.signal('change', self);
    },
    
    
    setPurchaseStatusWarningThreshold: function(thresholdMs) {
        if (thresholdMs > 0) {
            self.purchaseStatusWarningThreshold = thresholdMs;
        } else {
            self.purchaseStatusWarningThreshold = 2 * 60 * 1000;
        }
    },
    getPurchaseStatusWarningThreshold: function() {
        var self = this;
        return self.purchaseStatusWarningThreshold;
    }
});
Deal.Price = {
    currencies: {
        'USD':{
            decimals: 2,
            format: function(price) {
                return '$'+price;
            }
        },
        'GBP':{
            decimals: 2,
            format: function(price) {
                return '&pound;'+price;
            }
        },
        'EUR':{
            decimals: 2,
            format: function(price) {
                return ('EUR '+price).replace('.',',');
            }
        },
        'JPY':{
            decimals: 0,
            format: function(price) {
                return '&yen; '+price;
            }
        },
	'CNY':{
            decimals: 2,
            format: function(price) {
                return '&yen; '+price;
            }
        }
    },
    make_price: function(currency, price) {
        return {currency:currency, price:price};
    },
    test_same_currency: function(a, b) {
        if (a.currency != b.currency) {
            throw new Error("Currencies don't match: "+
                a.currency+" and "+b.currency);
        }
    },
    minus: function(a, b) {
        if (!a || !b) {
            return undefined;
        }
        this.test_same_currency(a, b);
        return this.make_price(a.currency, a.price-b.price);
    },
    percent_off: function(higher, lower) {
        if (!higher || !lower) {
            return undefined;
        }
        this.test_same_currency(higher, lower);
        var discount = higher.price - lower.price;
        
        
        if (gbResources.getCustomerData ('realm') == 'CN') {
            return (1 - (discount / higher.price)) * 10;
        }
        return discount * 100.0 / higher.price;
    },
    format: function(price, if_null) {
        if (!price) {
            return if_null;
        }
        var desc = this.currencies[price.currency];
        if (!desc) {
            desc = {
                decimals: 2,
                format: function(price) {
                    return price +' '+price.currency;
                }
            };
        }
        //return desc.format(Deal.commify(price.price, desc.decimals));
	//hack for character-encoding problems                                                                                                                                   
        var priceSpan = Deal.DOM.span();
        jQuery(priceSpan).html(desc.format(Deal.commify(price.price, desc.decimals)));
        return priceSpan.innerHTML;
    }
};
Deal.getListPrice = function(deal, marketplaceID) {
    
    if(marketplaceID == 'US' || marketplaceID == 'FR' ||
       marketplaceID == 'JP' || marketplaceID == 'CN') {
        return deal.asins[0].listPrice;
    } else {
	
        return null;
    }
};
Deal.getOurPrice = function(deal, marketplaceID) {
    var listPrice = Deal.getListPrice(deal, marketplaceID);
    var ourPrice = deal.asins[0].ourPrice;
    
    
    if(!ourPrice || marketplaceID == 'FR') {
        return null;
    } else if (marketplaceID == 'JP') {
        
        
        if (!listPrice ||
            parseFloat (ourPrice.price) < parseFloat (listPrice.price)) {
            return ourPrice;
        } else {
            return null;
        }
    } else {
        return ourPrice;
    }
};
Deal.getDiscount = function(deal, marketplaceID) {
    var listPrice = Deal.getListPrice(deal, marketplaceID);
    var ourPrice = Deal.getOurPrice(deal, marketplaceID);
    var dealPrice = deal.asins[0].dealPrice;
    
    if(listPrice != null && dealPrice != null) {
        return Deal.Price.minus(listPrice, dealPrice);
	
    } else if(ourPrice != null && dealPrice != null) {
        return Deal.Price.minus(ourPrice, dealPrice);
	
    } else {
        return null;
    }
};

Deal.getOurPricePercentOff = function(deal, marketplaceID) {
    var listPrice = Deal.getListPrice(deal, marketplaceID);
    var ourPrice = Deal.getOurPrice(deal, marketplaceID);
	
    if (listPrice != null && ourPrice != null) {
        return Deal.formatPricePercentage
                 (Deal.Price.percent_off(listPrice, ourPrice));
	
    } else {
        return null;
    }
};

Deal.getDealPricePercentOff = function(deal, marketplaceID) {
    var listPrice = Deal.getListPrice(deal, marketplaceID);
    var ourPrice = Deal.getOurPrice(deal, marketplaceID);
    var dealPrice = deal.asins[0].dealPrice;
    if (listPrice != null && dealPrice != null) {
        return Deal.formatPricePercentage (Deal.Price.percent_off(listPrice, dealPrice));
	
    } else if (ourPrice != null && dealPrice != null) {
        return Deal.formatPricePercentage (Deal.Price.percent_off(ourPrice, dealPrice));
    } else {
        return null;
    }
};

Deal.round = function(num, dec) {
    var result = Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
    return result;
};
Deal.Controller = Deal.Class({
    signals: [
        
        'cell_change', 
        
        'page_change', 
        
        
        'metadata_change' 
    ],
    __init__: function(p) {
        var self = this;
        Deal.Signal.init(self);
        
        Deal.Service.base_retry_interval = p.base_retry_interval || 60000;
        Deal.Service.continue_requests = p.continue_requests || true;
        self.login_uri = p.login_uri;
        self.images    = p.images;
        self.service = new Deal.Service({
            marketplace_id: p.marketplace_id,
            customer_id: p.customer_id,
            session_id: p.session_id,
            timeout: p.timeout,
            includeVariations: p.includeVariations
        });
        
        self.buying = {};
        
        self.deals = new Deal.Model.Deals(p.deals);
        
        self.metadata = new Deal.Model.Metadata(
            p.filters,
            p.orderings);
        self.browseNodes = p.browseNodes;
        self.ordering = p.ordering;
        
        self.statuses = {
            available:Deal.Service.AndDealFilter([
                Deal.Service.EndDateDealFilter("now", null),
                Deal.Service.SoldOutDealFilter(false)
            ]),
            upcoming: Deal.Service.StartDateDealFilter("now", null),
            sold_out: Deal.Service.SoldOutDealFilter(true),
            expired: Deal.Service.EndDateDealFilter(null, "now")
        };
	
	self.varPopCloseFunction = null;
        
        
        self.connections = [ ];
        
        self.cells = 1;
        
        self.cell_to_deal = {};
        
        self.deal_id_to_cell = {};
        
        self.page = 1;
        
        self.pages = 1;
        
        self.filter = undefined;
        
        self.order = undefined;
        
        
        self.deal_ids = [];
    },
    closeVarPopover: function() {
	var self = this;
	if ( self.varPopCloseFunction ) {
	    self.varPopCloseFunction();
	}
    },
    setVarPopCloseFunction: function(funcPointer) {
	var self = this;
	self.closeVarPopover();
	self.varPopCloseFunction = funcPointer;
    },
    
    
    _calc_deal_ids: function() {
        var self = this;
        self.deal_ids = self.metadata.get_deal_ids(
            self.filter, self.order);
        self._calc_pages();
    },
    
    
    _calc_pages: function() {
        var self = this;
        self.pages = Math.ceil(self.deal_ids.length/self.cells);
    },
    
    set_status: function(status) {
        var self = this;
        if (!self.statuses[status]) {
            throw new Error("No such status '"+status+"'");
        }
        self.status = status;
        var status_filter = self.statuses[status];
        var filters = {
            all: Deal.Service.AndDealFilter([
                status_filter,
                Deal.Service.SlotDealFilter(["LD:ALL"])
            ]),
            gbld: Deal.Service.AndDealFilter([
                status_filter,
                Deal.Service.SlotDealFilter(["GBLD:ALL"])
            ])
        };
        for (var browseNodeID in self.browseNodes) {
            filters[browseNodeID] = Deal.Service.AndDealFilter([
                status_filter,
                self.browseNodes[browseNodeID]
            ]);
        }
        
        self.service.get_deal_metadata({
                filters: filters,
                orderings: { start: self.ordering }
            },
            function(result) {
                self.metadata = new Deal.Model.Metadata(
                    result.filters, result.orderings);
                self.signal('metadata_change');
            },
            function(error) {
                Deal.log("error="+error);
            });
    },
    
    set_filter: function(filter) {
        var self = this;
        if (!self.metadata.filters[filter]) {
            throw new Error("Invalid filter: "+filter);
        }
        self.filter = filter;
        self._calc_deal_ids();
    },
    
    set_ordering: function(ordering) {
        var self = this;
        if (!self.metadata.orderings[ordering]) {
            throw new Error("Invalid ordering: "+ordering);
        }
        self.order = ordering;
        if (self.filter) {
            self._calc_deal_ids();
        }
    },
    
    /* example:
        var deal_index = (cx.page-1) * cx.cells;
        cx.set_cells(5);
        cx.set_page(Math.floor(deal_index/cx.cells));
        You could also use set_page_to_show_deal somehow.
    */
    set_cells: function(cells) {
        var self = this;
        if (cells < 1) {
            throw new Error("Invalid number of cells: "+cells);
        }
        self.cells = cells;
        self._calc_pages();
    },
    
    /* Note on animation:
      If you want to animate, you have to keep the cell_change signal from
      changing the contents immediately. What you can do is this:
      - The function that updates the cell checks to see if we are animating.
        If so, don't update the cell, just remember the new deal. Otherwise,
        call the "real_update" function.
      - When the user presses "next" or whatever, set "animating=true" and
        then call "next_page".
      - After "next_page" or whatever has been called, your widget should know
        what deals go where because the cell_change signal has been emitted
        for each cell.
      - Initiate the animation by doing the "real_update" in whatever order
        and frequency you want.
    */
    prev_page: function(wrap) {
        var self = this;
        if (self.page == 1) {
            if (wrap) {
                self.set_page(self.pages);
            } else {
                throw new Error("already at first page");
            }
        } else {
            self.set_page(self.page-1);
        }
    },
    
    next_page: function(wrap) {
        var self = this;
        if (self.page < self.pages) {
            self.set_page(self.page+1);
        } else {
            if (wrap) {
                self.set_page(1);
            } else {
                throw new Error("already at last page");
            }
        }
    },
    
    set_page_to_show_deal: function(deal_id) {
        var self = this;
        if (!deal_id) {
            self.set_page(1);
            return;
        }
        
        var i;
        for (i=0; i<self.deal_ids.length; i++) {
            if (self.deal_ids[i] == deal_id) {
                break;
            }
        }
        if (i == self.deal_ids.length) {
            Deal.log("couldn't find deal id "+deal_id);
            self.set_page(1);
            return;
        }
        self.set_page(Math.floor(i/self.cells) + 1);
    },
    set_page: function(page) {
        var self = this;
        var cell;
        var i;
        var deal;
        var deal_id;
        if (self.pages === 0) {
            for (cell=0; cell<self.cells; cell++) {
                self.signal('cell_change', cell, null);
            }
            self.signal('page_change', 0, 0, 0, 0, 0);
            return;
        }
        if (page < 1 || Math.floor(page) != page) {
            throw new Error("invalid page: "+page);
        }
        if (page > self.pages) {
            throw new Error("page ("+page+")"+
                " exceeds pages ("+self.pages+")");
        }
        self.disconnect_all();
        self.page = page;
        self.cell_to_deal = [];
        self.deal_id_to_cell = {};
        self.signal("page_change",
            self.page,
            self.pages,
            (self.page-1)*self.cells+1,
            Deal.min(self.page*self.cells, self.deal_ids.length),
            self.deal_ids.length);
        
        for (cell=0; cell < self.cells; cell++) {
            i = (self.page-1)*self.cells + cell;
            if (i < self.deal_ids.length) {
                deal_id = self.deal_ids[i];
                self.deal_id_to_cell[deal_id] = cell;
                deal = self.deals.get_deal(deal_id);
                self.cell_to_deal[cell] = deal;
                self.connect_deal_change(cell, deal);
                self.connect_deal_expire(deal);
                self.connect_deal_status_expire(deal);
                self.signal('cell_change', cell, deal);
            } else {
                
                self.cell_to_deal[cell] = null;
                self.signal('cell_change', cell, null);
            }
        }
        
        
        for (i = self.page*self.cells;
                i < (self.page+1)*self.cells && i < self.deal_ids.length;
                i++
        ) {
            self.connect_deal_expire(self.deals.get_deal(self.deal_ids[i]));
            self.connect_deal_status_expire(self.deals.get_deal(self.deal_ids[i]));
        }
    },
    
    
    connect_deal_change: function(cell, deal) {
        var self = this;
        var conn = deal.connect('change', function(deal) {
            self.signal('cell_change', cell, deal);
        });
        self.connections.push(conn);
    },
    
    connect_deal_expire: function(deal) {
        var self = this;
        var conn = deal.connect('expire', function(deal) {
            var conn2;
            var req = self.service.get_deal(deal.dealID,
                function(data) {
                    conn2.disconnect();
                    deal.load_from_deal(data);
                }, function(error) {
                    Deal.log("Error getting deal: "+error+
                        " stack: "+error.stack);
                });
            conn2  = conn.connect('disconnect', function() {
                req.cancel();
            });
        });
        self.connections.push(conn);
        if (deal.expired || deal.loading) {
            conn.trigger(deal);
        }
    },
    
    connect_deal_status_expire: function(deal) {
        var self = this;
        var conn = deal.connect('status_expire', function(deal) {
            
            var conn2;
            var req = self.service.get_deal_status(deal.dealID,
                function(status) {
                    conn2.disconnect();
                    deal.load_from_status(status);
                }, function(error) {
                    Deal.log("Error getting status: "+error+
                        " stack: "+error.stack);
                });
            conn2  = conn.connect('disconnect', function() {
                req.cancel();
            });
            
            var conn3;
            var req2 = self.service.get_deal_asin_status2(deal.dealID,
                function(asinStatusMap) {
                    conn3.disconnect();
                    
                    
                    
                    
                    var asins = deal.asins;
                    for (var i=0; i<asins.length; i++) {
                        var asin = asins[i];
                        if (asinStatusMap[asin.asin]) {
                            asin.status = asinStatusMap[asin.asin];
                            asin.status.purchaseStatus.expiresDate =
                              new Date (new Date().getTime() +
                                 parseInt (asin.status.purchaseStatus.msToExpiry, 10));
                        }
                    }
                    deal._init_asin_statuses();
                    
                    deal.signal('change', deal);
                },
                function(error) {
                  Deal.log("error with GetDealAsinStatus("+
                    deal.dealID+"):"+error);  
                }
            );
            conn3  = conn.connect('disconnect', function() {
                req2.cancel();
            });
        });
        self.connections.push(conn);
        if (deal.status.expired && !(deal.expired || deal.loading)) {
            conn.trigger(deal);
        }
    },
    disconnect_all: function() {
        var self = this;
        
        for (var i=0; i < self.connections.length; i++) {
            self.connections[i].disconnect();
        }
        self.connections = [];
    },
    
    buy: function(deal, asin, waitlist) {
        var self = this;
	var resultDealAsin;
        
        
        if (!self.service.customer_id) {
            var uri = self.login_uri;
            uri = uri.replace(/%257BdealID%257D/,
                deal.dealID);
            uri = uri.replace(/%257Basin%257D/,
                asin);
            uri = uri.replace(/%257BmarketplaceID%257D/,
                self.service.marketplace_id);
            uri = uri.replace(/%257Bcategory%257D/,
                self.filter);
            window.location = uri;
            return;
        }
        
        if (!self.buying[deal.dealID]) {
            self.buying[deal.dealID] = true;
            self.service.redeem_deal(deal.dealID, asin,
                function(result) {
                    delete self.buying[deal.dealID];
                    
                    if (!window.gbResources.getFeature('timed-checkout')) {
                        if (result.redeemed == 1) {
                               window.location = '/gp/cart/view.html'+
                                   '?ref=csld_'+deal.dealID;
                        } else {
                            deal.load_from_deal(result.deal);
                        }
                        
                        
                        return;
                    }
                    
                    var resultDeal = result.deal;
                    if (asin != undefined) {
                        var dealAsins = resultDeal.asins;
                        
                        
                        for (var i = 0; i < dealAsins.length; i++) {
                            var tmpAsin = dealAsins[i];
                            if (tmpAsin.asin == asin) {
                                resultDealAsin = tmpAsin;
                                break;
                            }
                        }
                    } else {
                        
                        
                        
                        resultDealAsin = resultDeal.asins[0];
                    }
                    var resultDealAsinPurchaseStatus =
                      resultDealAsin.status.purchaseStatus;
                    var resultPurchaseState =
                      resultDealAsinPurchaseStatus.state;
                    
                    
                    //
                    if ( result.redeemed == 1 &&
			 (resultPurchaseState == Deal.waitInLineStr ||
			  resultPurchaseState == Deal.inCartStr) ) {
			deal.cartP =
			    new Deal.CartPopover( resultDeal, resultDealAsin, self.images,
						  waitlist, resultPurchaseState );
			self.closeVarPopover();
                        deal.load_from_deal(result.deal);
                        if (result.redeemed == 1 && window.dealNotifier) {
                            Deal.log ("Calling dealNotifier.registerDeal(" + resultDealAsin.asin + ", " + resultDeal.dealID + ")");
                            dealNotifier.registerDeal(resultDealAsin.asin, deal);
                        }
                    } else {
                        deal.load_from_deal(result.deal);
                    }
                }, function (error) {
                    delete self.buying[deal.dealID];
                    Deal.log("Error redeeming deal: "+error);
                    if (asin != null) {
                        var asins = deal.asins;
                        if (asins == null) {
                            deal.status.percentClaimed = 100;
                        } else {
                            for (var i = 0; i < asins.length; i++) {
                                var tmpAsin = asins[i];
                                if (tmpAsin.asin == asin) {
                                    tmpAsin.status.percentClaimed = 100;
                                    break;
                                }
                            }
                        }
                    } else {
                        deal.status.percentClaimed = 100;
                    }
                    deal.signal('change', deal);
                });
        }
    }
});
Deal.DOM = {
    set_attributes: function(el, attrs) {
        for (var attr in attrs) {
            if (attr == 'style') {
                el.style.cssText = attrs[attr];
            } else {
                var new_attr = {
                    "class": "className",
                    "checked": "defaultChecked",
                    "usemap": "useMap",
                    "for": "htmlFor",
                    "readonly": "readOnly",
                    "colspan": "colSpan",
                    "bgcolor": "bgColor",
                    "cellspacing": "cellSpacing",
                    "cellpadding": "cellPadding",
                    "valign":"vAlign",
                    "nowrap":"noWrap"
                }[attr] || attr;
                el[new_attr] = attrs[attr];
            }
        }
    },
    el: function(type, attrs, children) {
        var el = document.createElement(type);
        if (attrs) {
            Deal.DOM.set_attributes(el, attrs);
        }
        if (children) {
            this.appendChildren(el, children);
        }
        return el;
    },
    img: function(attrs) {
        attrs = attrs || {};
        attrs.border = attrs.border || 0;
        return this.el('img', attrs);
    },
    div: function(attrs, children) {
        return this.el('div', attrs, children);
    },
    span: function(attrs, children) {
        return this.el('span', attrs, children);
    },
    p: function(attrs, children) {
        return this.el('p', attrs, children);
    },
    a: function(attrs, children) {
        return this.el('a', attrs, children);
    },
    table: function(attrs, children) {
        if (!attrs) {
            attrs = {};
        }
        attrs.cellpadding = attrs.cellpadding || 0;
        attrs.cellspacing = attrs.cellspacing || 0;
        attrs.border = attrs.border || 0;
        return this.el('table', attrs, [this.el('tbody', null, children)]);
    },
    tr: function(attrs, children) {
        return this.el('tr', attrs, children);
    },
    td: function(attrs, children) {
        return this.el('td', attrs, children);
    },
    td_nowrap: function(attrs, children) {
        return this.el('td', attrs, [this.span({style:'white-space:nowrap'}, children)]);
    },
    br: function(attrs, children) {
        return this.el('br', attrs, children);
    },
    hr: function(attrs) {
        return this.el('hr');
    },
    select: function(attrs, children) {
        return this.el('select', attrs, children);
    },
    option: function(attrs, children) {
        return this.el('option', attrs, children);
    },
    appendChildren: function(el, children) {
        for (var i=0; i<children.length; i++) {
            var child = children[i];
            if (typeof child == "string" || typeof child == "number") {
                child = this.text(child);
            } else if (child instanceof Array) {
                this.appendChildren(el, child);
                continue;
            } else if (child === null || child === undefined) {
                continue;
            }
            el.appendChild(child);
        }
    },
    clearChildren: function(el) {
        while (el.firstChild) {
            el.removeChild(el.firstChild);
        }
    },
    replaceChildren: function(el, children) {
        this.clearChildren(el);
        this.appendChildren.call(this, el, children);
    },
    text: function(text) {
        return document.createTextNode(text);
    }
};
Deal.Widget = {};
Deal.Widget.preload_img = function(src) {
    if (!Deal.Widget.preload_img.div) {
        Deal.Widget.preload_img.div = Deal.DOM.div({'style':'display:none'});
    }
    Deal.Widget.preload_img.div.appendChild(Deal.DOM.img({src:src}));
};
Deal.clock = {
    signals: ['tick']
};
Deal.Signal.init(Deal.clock);
Deal.clock.tick = function() {
    Deal.clock.signal('tick');
};
window.setInterval(Deal.clock.tick, 250);
Deal.Timer = function(t, spanAttributes, noHours) {
    var self = {};
    self.t = t;
    self.noHours = noHours;
    var attributes = {};
    self.span = Deal.DOM.span (attributes);
    self.onTimeoutFunction = null;
    
    self.setOnTimeoutFunction = function (timeoutFunction) {
	self.onTimeoutFunction = timeoutFunction;
    };
    self.update = function() {
	var msToT = Deal.max(
			self.t.getTime() - new Date().getTime(),
			0);
        if (msToT <= 0) {
	    self.disconnect();
	    
	    
	    
	    if (self.onTimeoutFunction != null) {
		self.onTimeoutFunction();
	    }
        }
        var h = Math.floor(msToT/(60*60*1000));
        if (h<10) { h = '0'+h; }
        var m = Math.floor(msToT/(60*1000)%60);
        if (m<10 && !self.noHours) { m = '0'+m; }
        var s = Math.floor(msToT/(1000)%60);
        if (s<10) { s = '0'+s; }
        var hourSep = ':';
        var minSep  = ':';
        var secSep  = '';
        if (gbResources.getCustomerData ('realm') == 'FR') {
            hourSep = 'h ';
            minSep  = 'min ';
            secSep  = 's';
        }
	if ( self.noHours ) {
	    self.span.innerHTML = m + minSep + s;
	} else {
	    self.span.innerHTML = h + hourSep + m + minSep + s + secSep;
	}
    };
    self.disconnect = function() {
        self.cx.disconnect();
    };
    self.cx = Deal.clock.connect('tick', self.update);
    self.update();
    return self;
};
Deal.CheckoutTimer = function(t, useColons) {
    var self = {};
    self.span = Deal.DOM.span();
    self.t = t;    
    self.onTimeoutFunction = null;
    
    self.setOnTimeoutFunction = function (timeoutFunction) {
        self.onTimeoutFunction = timeoutFunction;
    };
    self.update = function() {
	var msToT = Deal.max(
			     self.t.getTime() - new Date().getTime(),
			     0);
    if (msToT <= 0) {
        self.disconnect();
        
        
        
        if (self.onTimeoutFunction != null) {
            self.onTimeoutFunction();
        }
        return;
    }
    
	var minutes = Math.floor(msToT/(60*1000)%60);
	if (minutes < 10 && useColons) { minutes = '0' + minutes; }
	var seconds = Math.floor(msToT/(1000)%60);
    if (seconds < 10 && useColons) { seconds = '0' + seconds; }
    
    var minutesString = ' ' + gbResources.getString ('gbd_minutes') + ' ';
    var secondsString = ' ' + gbResources.getString ('gbd_seconds') + ' ';
    
    if (useColons) {
        
        var timeSeparators = {
            'US': ':',
            'UK': ':',
            'DE': ':',
            'FR': 'm',
            'JP': ':',
            'CN': ':'
        };
        var realm = gbResources.getCustomerData ('realm');
        
        var separator = ':';
        if (timeSeparators[realm]) {
            separator = timeSeparators[realm];
        }
        minutesString = '<span class="timeleft-large">' + separator + '</span>';
        secondsString = '';
    }
	var timeleft = '<span class="timeleft-large">'+minutes+'</span>'+
	               minutesString+
	               '<span class="timeleft-large">'+seconds+'</span>'+
	               secondsString;
        self.span.innerHTML  = timeleft;
    };
    self.disconnect = function() {
        self.cx.disconnect();
    };
    self.cx = Deal.clock.connect('tick', self.update);
    self.update();
    return self;
};
Deal.truncate_text = function(el) {
    if (el.scrollHeight > el.clientHeight ||
            el.scrollWidth > el.clientWidth
    ) {
        el.title = el.innerHTML;
    }
    while (el.scrollHeight > el.clientHeight ||
            el.scrollWidth > el.clientWidth
    ) {
        el.innerHTML = el.innerHTML.replace(
            /\s*\S{0,10}$/, '...');
    }
};
Deal.truncate_description = function(el, len) {
    var truncated = '';
    var text = el.innerHTML;
    if (text == null) {
	
	
	if ( typeof(el) == 'string' ) {
	    text = el;
	    truncated = el;
	} else {
	    return '';
	}
    }
    if (text.length > len) {
        var str = text.substr(0, len);
        var words = str.split(' ');
        words[words.length-1] = '';
        truncated = words.join(' ');
        truncated = truncated.replace(/[^\w\d]*$/, '');
        truncated = truncated.substr(0, truncated.length - 1) + '...';
        el.title = el.innerHTML;
        el.innerHTML = truncated;
    } else {
    	truncated = text;
    }
    return truncated;
};
Deal.help = function(image) {
    var div;
    var img;
    var text;
    div = Deal.DOM.div(null, [
        img = Deal.DOM.img({
            src: image
        })
    ]);
    amznJQ.available('popover', function() {
        jQuery(img).amazonPopoverTrigger({
            showOnHover: true,
            showCloseButton: false,
            location: ['left', 'bottom'],
            width: 300,
            literalContent: window.gbResources.getString('gbd_ld_help')
        });
    });
    return div;
};
Deal.CombinationGenerator = Deal.Class({
    __init__: function (n, r) {
        var self = this;
        self.a = new Array();
        self.n = null;
        self.r = null;
        if (r > n) {
          Deal.log("ERROR: r > n");
          return;
        }
        if (n < 1) {
          Deal.log("ERROR: n < 1");
          return;
        }
        self.n = n;
        self.r = r;
        self.a = new Array(r);
        var nFact = self.getFactorial (n);
        var rFact = self.getFactorial (r);
        var nminusrFact = self.getFactorial (n - r);
        self.total = nFact / (rFact * nminusrFact);
        self.reset ();
    },
    reset: function () {
      var self = this;
      for (var i = 0; i < self.a.length; i++) {
        self.a[i] = i;
      }
      self.numLeft = self.total;
    },
    getNumLeft: function () {
      var self = this;
      return self.numLeft;
    },
    hasMore: function() {
      var self = this;
      if (self.numLeft == 0) {
          return false;
      }
      return true;
    },
    getTotal: function () {
      var self = this;
      return self.total;
    },
    getFactorial: function (n) {
      var self = this;
      var fact = 1;
      for (var i = n; i > 1; i--) {
        fact *= i;
      }
      return fact;
    },
    getNext: function () {
       var self = this;
      if (self.numLeft == self.total) {
        self.numLeft -= 1;
        return self.a;
      }
      var i = self.r - 1;
      while (self.a[i] == self.n - self.r + i) {
        i--;
      }
      self.a[i] = self.a[i] + 1;
      for (var j = i + 1; j < self.r; j++) {
        self.a[j] = self.a[i] + j - i;
      }
      self.numLeft -= 1;
      return self.a;
    }
});
Deal.PStatus = Deal.Class({
    /* Class used for timed checkout functionality */
    __init__: function(deal) {
	var self = this;
	self.deal = deal;
	self.widget = deal.widget;
	self.popover = deal.popover;
	self.stateAsins = {};
	
        for (var i = 0; i < self.deal.asins.length; i++) {
	    var tmpAsin = self.deal.asins[i];
	    var pState = Deal.getPurchaseState(deal, tmpAsin);
	    if ( self.stateAsins[pState] == undefined ) {
		self.stateAsins[pState] = [];
	    }	    
	    self.stateAsins[pState].push(tmpAsin);
        }
	
	if ( self.stateAsins[Deal.inCartStr] ) {
	    self.stateAsins[Deal.inCartStr].sort(self.sortByAsinTimes);
	}
	
	if ( self.stateAsins[Deal.pendingAtcStr] ) { 
	    self.stateAsins[Deal.pendingAtcStr].sort(self.sortByAsinTimes); 
	} 
    },
    sortByAsinTimes: function(a, b) {
	
	
	var x = a.status.purchaseStatus.expiresDate;
	var y = b.status.purchaseStatus.expiresDate;
	return x-y;
    },
    getCount: function(pState, onlyValids) {
	
	
	var self = this;
	var now  = new Date();
	var length = 0;
	if ( self.stateAsins[pState] && self.stateAsins[pState].length ) {
	    for (var i=0; i < self.stateAsins[pState].length; i++) {
		var expDate =
		    self.stateAsins[pState][i].status.purchaseStatus.expiresDate;
		if ( expDate == undefined  ) { 
		    expDate = now; 
		} 
		if ( onlyValids && expDate.getTime() > now.getTime() ) {
		    length++;
		} else if ( !onlyValids ) {
		    length++;
		}
	    }
	}
	return length;
    },
    getTime: function(asinString, state) {
	
	
	
	
        var self = this;
	var now = new Date();
        
        
	
	
	
	
	if ( self.stateAsins[state] ) { 
	    for ( var i=0; i < self.stateAsins[state].length; i++ ) { 
		
		var expDate = 
		    self.stateAsins[state][i].status.purchaseStatus.expiresDate; 
		if ( asinString != undefined ) { 
		    if ( self.stateAsins[state][i].asin == asinString ) { 
			return expDate;
		    } 
		} else { 
		    
		    if ( expDate.getTime() > now.getTime() ) { 
			self.asin = self.stateAsins[state][i]; 
			return expDate;
		    } 
		} 
	    } 
	}
        return null;
    },
    getTimerMessage: function(asinString, num, pending) {
	
	
	
	
	
	var self = this;
	var timerMsg = null;
	if ( asinString != undefined && asinString != null ) {
	    self.asinString = asinString;
	}
	var state = Deal.inCartStr;
	if ( pending ) {
	    state = Deal.pendingAtcStr;
	}
	var expiresDate = self.getTime(self.asinString, state);
	var timer = Deal.Timer(expiresDate, null, true);
	if ( pending ) { 
	    timerMsg = Deal.DOM.div({'class':'status_msg_content'}, 
			    [gbResources.getString ('gbd_deal_atc_time_part1') + ' ',
			     Deal.DOM.span({'class':'status_timer'}, 
				  [timer.span]), 
                 ' ' +
                 gbResources.getString ('gbd_deal_atc_time_part2') ?
                   gbResources.getString ('gbd_deal_atc_time_part2') : '']);
	} else { 
        var ending =
             gbResources.getString ('gbd_check_out_within_time_part2_single') != "null" ?
              gbResources.getString ('gbd_check_out_within_time_part2_single')
              : '';
	    if ( num != null && num > 1 ) {
        ending =
          gbResources.getString ('gbd_check_out_within_time_part2_plural') != "null" ?
           gbResources.getString ('gbd_check_out_within_time_part2_plural')
           : '';
	    }
	    timerMsg = Deal.DOM.div({'class':'status_msg_content'},
		       [gbResources.getString ('gbd_check_out_within_time_part1') + ' ',
			Deal.DOM.span({'class':'status_timer'},
			    [timer.span]),
			' ' + ending]);
	}
	return timerMsg;
    },
    getItemMsg: function(num, type) {
	var self = this;
	
	var singleMsg = window.gbResources.getString('gbd_deal_in_cart');
	var allMsg = window.gbResources.getString('gbd_all_options_in_cart');
	if ( type == 'wait' ) { 
	    singleMsg = window.gbResources.getString('gbd_you_are_waitlisted');
	    allMsg = window.gbResources.getString('gbd_all_are_waitlisted');
	} 
	var itemMsg = Deal.DOM.span({'class':'item_msg'},
				    [singleMsg]);
	
	if ( self.deal.asins.length > 1 ) {
	    var finalMsg = null;
	    if ( num > 1 && num == self.deal.asins.length ) { 
		
		finalMsg = allMsg;
	    } else if ( num == 1 ) { 
		
		finalMsg = window.gbResources.getString('gbd_1_option_in_cart');
		if ( type == 'wait' ) { 
		    finalMsg = window.gbResources.getString('gbd_1_option_waitlisted');
		} 
	    } else if ( num > 1 ) { 
		
		finalMsg = window.gbResources.getString('gbd_num_options_in_cart', {num: num});
		if ( type == 'wait' ) { 
		    finalMsg = window.gbResources.getString('gbd_num_options_in_waitlist', {num: num});
		} 
	    }
	    jQuery(itemMsg).html(finalMsg);
	}
	return itemMsg;
    },
    getMixedItemMsg: function(cartNum, waitNum) { 
	var self = this; 
	var itemMsg = Deal.DOM.span({'class':'item_msg_normal'}, []); 
	 
	 
	var inCart = Deal.DOM.span({}, [ 
			  Deal.DOM.span({style:'font-weight:bold;'}, 
			       [cartNum]), 
			       ' ' + window.gbResources.getString('gbd_in_cart') + ' ']); 
	var inWaitlist = Deal.DOM.span({}, [ 
			      Deal.DOM.span({style:'font-weight:bold;'}, 
				   [waitNum]), 
			           ' ' + window.gbResources.getString('gbd_on_waitlist') ]); 
	var minTimeLeft = self.getTime (null, Deal.inCartStr); 
	var timer = Deal.Timer(minTimeLeft, null, true); 
	var timerMsg = Deal.DOM.span({'class':'timer'}, [ 
			    Deal.DOM.span({style:'font-color:#666666 !important;'}, 
			         [ window.gbResources.getString('gbd_check_out_in') + ' ']), 
			    Deal.DOM.span({'class':'status_timer'}, 
				 [timer.span])]); 
	Deal.DOM.appendChildren(itemMsg,
	     [inCart, 
	      timerMsg, 
	      Deal.DOM.br(), 
	      inWaitlist]); 
	return itemMsg; 
    }, 
    showBuying: function() { 
	var self = this; 
	Deal.DOM.replaceChildren(self.buyButtonContainer, [ 
	     Deal.DOM.img({ 
		  id:'buying-'+self.deal.dealID, 
		  alt: window.gbResources.getString('csld-checking_deal_status'),
		  style: 'display: inline;',
		  src:gbResources.getImage ('spinner')
	     }),  
	     Deal.DOM.span({ 
		  style:'color: #E68221;'+ 
			'font-weight: bold;'+ 
			    'font-size: 10px;' },
		 [window.gbResources.getString('csld-checking_deal_status_alt')]) 
	     ]); 
	self.buy_button.onclick = null; 
    },
    getContent: function() {
	var self = this;
	var numInCart         = self.getCount(Deal.inCartStr, false);
	var validNumInCart    = self.getCount(Deal.inCartStr, true);
	var numInWaitlist     = self.getCount(Deal.waitInLineStr, false); 
	var numPending        = self.getCount(Deal.pendingAtcStr, true); 
    var invalidNumPending =  self.getCount(Deal.pendingAtcStr, false); 
	if ( numPending > 0 ) { 
	    
	    
	    self.buy_button = Deal.DOM.img({ 
                                 style:'cursor:pointer;' +
                                 		'display: inline;', 
				 src:gbResources.getImage ('add_to_cart')}); 
	    self.buyButtonContainer = Deal.DOM.div({style:'opacity:1.0;'+ 
							 'filter:"alpha(opacity=100)"'+ 
							 'cursor:pointer'}, 
					  [ self.buy_button ]); 
	    self.buy_button.onclick =  function(event) { 
		if (event) { 
		    event.stopPropagation(); 
		    event.preventDefault(); 
		}
		self.widget.cx.buy(self.deal, self.asin.asin, true); 
		self.showBuying(); 
		return false; 
	    }; 
	    var timerMsg = self.getTimerMessage(null, numPending, true);
	    if ( Deal.isPrimeEligible(self.deal) ) { 
            if (gbResources.getCustomerData ('realm') == 'US' ||
                (gbResources.getCustomerData ('realm') != 'US' &&
                 gbResources.getCustomerData ('isPrimeMember'))) {
		        self.deal.prime =
                  Deal.DOM.span(
                    {style:'display:block; position:absolute; left: 115px;'},
		            [ Deal.DOM.img(
                       {alt: window.gbResources.getString('csld-prime_eligible_alt'),
				        id:'prime-badge-'+self.deal.dealID,
				        style: 'display: inline;',
				        src:gbResources.getImage ('prime')}) 
		            ]);
            }
	    } 
	    return Deal.DOM.div({style:'position:relative;'}, [
		        self.deal.prime, 
		        Deal.DOM.div({style:'position:relative;'},
			     [self.buyButtonContainer, 
			      timerMsg]) ]);
	} else if ( numInCart == 0 && numInWaitlist == 0 &&
                invalidNumPending == 0) {
	    
	    
	    return null;
	} else if ( validNumInCart == 0 && numInWaitlist == 0) {
	    
	    
	    return Deal.DOM.div({'class':'status_content'},
		       [Deal.DOM.img({
			    id:'buying-'+self.deal.dealID,
			    alt: window.gbResources.getString('csld-checking_deal_status'),
			    style: 'display: inline;',
			    src:gbResources.getImage ('spinner')
		        }), 
		        Deal.DOM.span({
		    	    style:'color: #E68221;'+
			          'font-weight: bold;'+
				  'font-size: 10px;'
			}, [window.gbResources.getString('csld-checking_deal_status_alt')])
	    ]);
	}
	
	
	
	var itemMsg  = null; 
	var timerMsg = null; 
	if ( validNumInCart > 0 && numInWaitlist == 0 ) { 
	    
	    itemMsg = self.getItemMsg(validNumInCart, 'cart'); 
	    timerMsg = self.getTimerMessage(null, validNumInCart, false); 
	} else if ( numInWaitlist > 0 && validNumInCart == 0) {
	    
	    itemMsg = self.getItemMsg(numInWaitlist, 'wait'); 
	} else { 
	    
	    
	    itemMsg = self.getMixedItemMsg(validNumInCart, numInWaitlist); 
	} 
	
	
	
	if ( self.deal.asins.length > 1 && !self.deal.status.ended ) { 
	    var optionsLink = null;
	    optionsLink = Deal.DOM.span({'class':'options_link'},
			      [ window.gbResources.getString('gbd_select_more_options') ]);
	    if ( !self.popOver ) {
		self.popOver = new Deal.VariationPopover(optionsLink, self.deal, self.widget.cx);
	    }
	}
	return Deal.DOM.div({'class':'status_content'},
		   [ itemMsg,
		     Deal.DOM.br(),
		     timerMsg,
		     optionsLink]);
    }
});
Deal.CartPopover = Deal.Class({
    
    
    
    __init__: function(deal, asin, images, waitlist, pState) {
        var self      = this;
        self.deal     = deal;
        self.asin     = asin;
	self.waitlist = waitlist; 
	self.state    = pState;
	self.popover  = self.getPopoverDiv(); 
	var width = 835; 
	var height = 250; 
	var modal = true; 
	var closeText = window.gbResources.getString('gbd_close_and_continue_shopping');
	if ( self.state == Deal.waitInLineStr ) { 
	    width = 410; 
	    closeText = null; 
	    modal = false; 
	}
	
	amznJQ.available('popover', function() {
	    self.pop =
		jQuery.AmazonPopover.displayPopover({
		    showCloseButton: true,
		    width: width,
		    height: height,
		    modal: modal,
		    closeText: closeText,
		    closeEventInclude: 'CLICK_OUTSIDE',
		    location: 'centered',
		    locationAlign: 'middle',
		    literalContent: self.popover,
		    onHide: function() {
			self.onHide();
		    }
	    });
	});
	
	
	if (self.timer) {
	    self.timer.setOnTimeoutFunction (function() {
		if (self.pop) {
		    self.pop.close();
		}
	    });
	}
    },
    getPopoverDiv: function() {
	
	var self  = this;
	var imgStyle = 'background:url('+gbResources.getImage ('sprite_site_wide') +') -30px -189px;'; 
	var header = window.gbResources.getString('gbd_1_deal_to_cart');
	var labelStyle = '';
	if ( self.state == Deal.waitInLineStr ) { 
	    header = window.gbResources.getString('gbd_joined_waitlist'); 
	    labelStyle = 'font-size: 15px; top:-3px; left:23px;'; 
	    imgStyle = 'background:url('+gbResources.getImage ('sprite_site_wide')+ 
		       ') -139px -189px; height: 20px; width: 20px;'; 
	}
	var DEstyle = null;
	if ( gbResources.getCustomerData('realm') == 'DE' ) {
	    DEstyle = 'font-size: 15px !important;';
	}
	var space = Deal.DOM.br();
	var timerBox = null;
	var msgBox = null;
	var colWidth = 'width: 280px;'; 
	var cartPopClass = 'image_title_price'; 
	if ( self.state == Deal.waitInLineStr ) { 
	    cartPopClass = 'image_title_price_waitlist'; 
	    msgBox = self.get_inner_message(); 
	    colWidth = 'width: 410px;'; 
	    space = null;
	} else { 
	    timerBox = self.get_timer_atc_table(); 
	} 
	return Deal.DOM.div({}, [
		   Deal.DOM.div({style:'position:relative;'}, [
		       Deal.DOM.div({'class':'greencheck_img',
			             style:imgStyle}, [
                            Deal.DOM.span({'class':'cart-popover-label',
				           style:labelStyle+DEstyle},
					  [header])
			   ])
		   ]),
		   space,
		   Deal.DOM.table({'class':'cart-popover-table'}, [
		       Deal.DOM.tr({}, [
			   Deal.DOM.td({'class':cartPopClass,
					style:colWidth}, [
				self.get_image_title_price_table(),
			   ]),
			   timerBox
		       ]),
		       msgBox
		    ])
		]);
    },
    get_position_chance: function() {
	
	
	var self = this;
	var div = null;
	
	if ( self.asin.status.purchaseStatus.waitListStatus == undefined ||
	     self.asin.status.purchaseStatus.waitListStatus == null ) {
	    return null;
	} else {
	    var wlStatus  = self.asin.status.purchaseStatus.waitListStatus;
	    var indicator = wlStatus.inCartIndicator;
	    var position  = wlStatus.position;
	    if ( indicator == undefined || indicator == null ||
		 position == undefined || position == null ) {
		return null;
	    }
	}
	if ( self.asin.status.purchaseStatus.waitListStatus != undefined ) {
	    var inCartIndicator =
		self.asin.status.purchaseStatus.waitListStatus.inCartIndicator;
	    var position =
		self.asin.status.purchaseStatus.waitListStatus.position;
	    if ( position > 500 ) {
		position = '500+';
	    } else {
		position = 
		    jQuery('<span />').html(window.gbResources.getString('gbd_position_num', {num: position}));
        position = position[0];
	    }
        var wlPositionColumn =
            Deal.DOM.td({'class':'pc_value'
                        }, [
                        position
                       ]);
        
        if (gbResources.getCustomerData ('realm') == 'CN') {
            jQuery (wlPositionColumn).css ('font-weight', '');
        }
        var wlPositionDescriptionColumn =
            Deal.DOM.td({'class':'pc_label'}, [
                        window.gbResources.getString('gbd_place_on_waitlist')
                       ]);
        var chanceValueColumn =
            Deal.DOM.td({'class':'pc_value'}, [
                        window.gbResources.getString('gbd_'+inCartIndicator.toLowerCase())
                       ]);
        var chanceDescriptionColumn =
            Deal.DOM.td({'class':'pc_label'}, [
                        window.gbResources.getString('gbd_chance_at_deal')
                       ]);
        var wlPositionLeftCol;
        var wlPositionRightCol;
        var chanceLeftCol;
        var chanceRightCol;
        
        if (gbResources.getCustomerData ('realm') == 'CN') {
            wlPositionLeftCol  = wlPositionDescriptionColumn;
            wlPositionRightCol = wlPositionColumn;
            chanceLeftCol      = chanceDescriptionColumn;
            chanceRightCol     = chanceValueColumn;
        } else {
            wlPositionLeftCol  = wlPositionColumn;
            wlPositionRightCol = wlPositionDescriptionColumn;
            chanceLeftCol      = chanceValueColumn;
            chanceRightCol     = chanceDescriptionColumn;
        }
	    div = Deal.DOM.div({'class':'waitlist_position_chance'}, [
	      Deal.DOM.br(),
              Deal.DOM.table({}, [
         
		 Deal.DOM.tr({}, [
            wlPositionLeftCol,
            Deal.DOM.td(null, ['\xA0']),
            wlPositionRightCol
         ]),
         
		 Deal.DOM.tr({}, [
            chanceLeftCol,
            Deal.DOM.td(null, ['\xA0']),
            chanceRightCol
         ])
            ]) ]);
	}
	return div;
    },
    get_inner_message: function() { 
	
	
	var self = this; 
	var message = Deal.DOM.span({'class':'waitlist_message'},
			  [ window.gbResources.getString('gbd_continue_shopping_alert_msg')]); 
	
	if ( self.state == Deal.waitInLineStr && !self.waitlist) { 
	    jQuery(message).html(window.gbResources.getString('gbd_forced_waitlist_msg'));
	} 
	var bubbleStyle = 'background:url('+gbResources.getImage ('sprite_site_wide')+') -117px -189px;'; 
	var bubble = Deal.DOM.div({'class':'bubble', style:bubbleStyle}, [' ']); 
	var continueShopping = Deal.DOM.a({ 
                                    href:'#', 
				    'class':'ap_custom_close'}, [ 
				    Deal.DOM.img({ 
					 alt: window.gbResources.getString('gbd_continue_shopping'),
					 style: 'display: inline;',
					 src:gbResources.getImage ('continue_shopping')
				    }) 
			       ]); 
	return Deal.DOM.tr({}, [ Deal.DOM.td({}, [ 
		    Deal.DOM.table({'class':'inner_message_waitlist'}, [ 
			 Deal.DOM.tr({}, [ 
                              Deal.DOM.td({style:'padding: 8px 0 8px 8px;'}, 
                                   [ bubble ]), 
                              Deal.DOM.td({style:'padding: 8px;'}, [ message ]) 
                         ]), 
                         Deal.DOM.tr({}, [ 
			      Deal.DOM.td({style:'padding: 0 8px 8px;', colSpan:2}, 
                                   [ continueShopping ]) 
                         ]) 
               ])])]); 
    }, 
    get_timer_atc_table: function() {
	
	
	var self = this;
	return Deal.DOM.td({}, [
		 Deal.DOM.table({'class':'inner-cart-popover-table'}, [
		   Deal.DOM.tr({}, [
		       Deal.DOM.td({style:'text-align:left; padding:10px;'}, [
			   Deal.DOM.a({
			     href:'/gp/cart/view.html/ref=gno_cart'}, [
			       Deal.DOM.img({
				   alt: window.gbResources.getString('gbd_view_cart_proceed'),
				   style: 'display: inline;',
				   src:gbResources.getImage ('view_cart_proceed')
			       })
			   ]),
			   self.get_timer_message_table()
		       ])
		   ])
	       ])
	   ]);
    },
    get_timer_message_table: function() {
	
	
	var self = this;
	var message = null;
	if (window.gbResources.getFeature('notifier-waitlist') &&
	    window.gbResources.getFeature('notifier-waitlist') != 'C') {
	    message = window.gbResources.getString('gbd_time_before_alert_msg',
			    {time: window.gbResources.getFeature('notifier-waitlist')})
	}
	return Deal.DOM.table({'class':'inner-msg'}, [
		   Deal.DOM.tr({}, [
		       Deal.DOM.td({style:'padding: 8px 8px 0px;'}, [
			   Deal.DOM.div({'class':'alert',
			       style:'background:url('+gbResources.getImage ('sprite_site_wide')+');' }, [])
			   ]),
		            Deal.DOM.td({'class':'msgtitle'}, [
			        window.gbResources.getString('gbd_checkout_within')
			   ])
		       ]),
		   Deal.DOM.tr({}, [
		       Deal.DOM.td(null, []),
		       Deal.DOM.td({'class':'timeleft'}, [
			   self.timeRemaining()
		       ])
		   ]),
		   Deal.DOM.tr({}, [
		       Deal.DOM.td(null, []),
		       Deal.DOM.td({'class':'smallprint', style:'width:100%;'}, [
                           message
		       ])
		   ])
	       ]);
    },
    get_image_title_price_table: function() {
	
	
	var self = this;
	var asinImage = self.asin.imageURL;
	asinImage = asinImage = Deal.resizeImage(asinImage, 85);
	var asinTitle = null;
	if ( self.deal.detail.title ) {
	    asinTitle =
		Deal.truncate_description(self.deal.detail.title, 65);
	}
	var prevPrice = null;
	if ( self.asin.listPrice ) {
	    prevPrice = Deal.Price.format(self.asin.listPrice);
	} else if ( self.asin.ourPrice) {
	    prevPrice = Deal.Price.format(self.asin.ourPrice);
	}
	var spacing = Deal.DOM.br(); 
	var lpLabel = window.gbResources.getString('csld-multi-cat-list_price') + ' ';
	if ( gbResources.getCustomerData('realm') == 'UK' ) {
	    lpLabel = window.gbResources.getString('csld-multi-cat-price') + ' ';
	}
	var dpLabel = window.gbResources.getString('csld-deal_price') + ' '; 
	var positionChance = null; 
	if ( self.state == Deal.waitInLineStr ) { 
	    spacing = ' '; 
	    dpLabel = null; 
	    lpLabel = null;
	    positionChance = self.get_position_chance();
	} 
	var titleWidth = null;
	if ( self.state == Deal.waitInLineStr ) {
	    titleWidth = "width:247px";
	}
	var listPriceRow = '';
	if ( prevPrice ) {
	    listPriceRow = [
	    	Deal.DOM.span({'class':'cart-popover-listprice'}, [
		    lpLabel
                ]),
		Deal.DOM.span({'class':'cart-popover-prevprice'}, [
		    prevPrice
		])
	    ];
	}
	var dealPriceCell =
	    Deal.DOM.span({style:'white-space:nowrap'},
	        [ Deal.Price.format(self.asin.dealPrice) ]);
	return Deal.DOM.table({style:'padding-top:10px;'}, [
	    Deal.DOM.tr({}, [
		Deal.DOM.td({style:'padding-right: 10px; vertical-align: top;'}, [
		    Deal.DOM.img({
			alt: window.gbResources.getString('gbd_deal_image'),
			style: 'display: inline',
			src:asinImage
		    })
		]),
		Deal.DOM.td({style:'vertical-align: top;' + titleWidth}, [
		    Deal.DOM.span({'class':'cart-popover-asintitle'}, [
			asinTitle
		    ]),
		    Deal.DOM.p(null, []),
		    listPriceRow,
		    spacing,
		    Deal.DOM.span({'class':'cart-popover-dealprice'}, [
			dpLabel,
			dealPriceCell
		    ]),
		    positionChance
		])
            ])
	]);
    },
    timeRemaining: function() {
        var self = this;
	self.timer_div = Deal.DOM.div({
	    'class':'timeleft'
        }, []);
        self.updateTimeRemaining();
        return self.timer_div;
    },
    updateTimeRemaining: function() {
        var self = this;
        var deal = self.deal;
	var asin = self.asin;
        if ( self.timer ) {
            self.timer.disconnect();
        }
        if (deal.status.ended) {
            self.timer = null;
        } else {
	    var msToExpiry = parseInt(asin.status.purchaseStatus.msToExpiry, 10);
	    var countDown = new Date();
	    countDown.setTime(countDown.getTime() + msToExpiry);
	    self.timer = Deal.CheckoutTimer(countDown, false);
            Deal.DOM.replaceChildren(self.timer_div, [
                self.timer.span
            ]); 
        }
    },
    onHide: function() {
        var self = this;
	if ( self.timer ) {
	    self.timer.disconnect();
	}
    }
});
Deal.VariationPopover = Deal.Class({
    __init__: function(element, deal, cx) {
        var self = this;
        self.deal = deal;
        self.cx = cx;
        self.dropDownOptions = {};
        self.currentSelections = {};
	var x = 0;
	var y = 0;
	
	if (self.cx.name == 'GBLD_WIDGET') {
	    x = -137;
	    y = -156;
	} else if (self.cx.cells == 1) {
	    
	    
	    x = -174;
	    y = -197;
	} else {
	    
	    x = -79;
	    y = -221;
	}
        amznJQ.available('popover', function() {
            jQuery(element).amazonPopoverTrigger({
                showOnHover: false,
                locationAlign: "middle",
                location: 'auto',
		locationOffset: [x, y],
                literalContent: ' ',
		closeEventInclude: 'CLICK_OUTSIDE',
                onShow: function(popover) {
                    self.onShow(popover);
                },
                onHide: function() {
                    self.onHide();
                },
		title: '<span style="color: #E47911;">'+window.gbResources.getString('csld-deal_options')+'</span>',
		closeText: window.gbResources.getString('csld-close')
            });
        });
    },
    onShow: function(popover) {
        var self = this;
	self.cx.setVarPopCloseFunction(popover.close);
        self.selection = {};
        self.selectors = {};
        self.selection_span = {};
        self.selectionDropDownElements = {};
        self.asinsForSelection();
        self.allValidCombinations = {};
        self.getAllCombinations();
        
        
        var container = popover.find('.ap_sub_content');
        if (container.length == 0) {
            container = popover.find('.ap_content');
        }
	var progressBar = self.progressBar();
        var restrictions = Deal.DOM.div({style:'padding-top: 4px;'}, [
			        Deal.DOM.a({
				    'href':window.gbResources.getString('csld-restrictions_link'),
				    style:'font-size: 11px; text-decoration: none;'
				}, [window.gbResources.getString('csld-restrictions_apply')])
			    ]);
	if ( self.marketplaceID == 'US' || self.marketplaceID == 'UK' ) {
	    restrictions = Deal.DOM.div({style:'position:relative; left:0px; font-family: verdana;'},
					[window.gbResources.getString('gbd_ld_rules')]);
	}
        container.empty().append(
            Deal.DOM.table({width:'430'}, [
                Deal.DOM.tr({valign:'top'}, [
                    Deal.DOM.td({width:'120'}, [
                        self.image(),
			progressBar,
                        self.timeRemaining()
                    ]),
                    Deal.DOM.td({width:'10'}),
                    Deal.DOM.td({}, [
                        self.title(),
                        self.selector(),
                        self.price(),
                        Deal.DOM.div({
                          "style": "margin-top:10px; position: relative;",
                          "height": "22"
                         }, [
                            self.buyButton(),
                            self.statusBox(),
			    Deal.DOM.br(),
			    restrictions
                        ])
                    ])
                ])
            ])
        );
        self.container = container;
        self.change_cx = self.deal.connect(
            'change',
            self, 'deal_change');
    },
    getSelectionCombinations: function (elements, depth) {
        var indices = new Array();
        if (depth == 0) {
            elements.length;
        }
        var x = new Deal.CombinationGenerator (elements.length, depth);
        var combination = "";
        var selectionCombinations = [];
        while (x.hasMore()) {
           combination = "";
           indices = x.getNext();
           var tmpArr = [];
           for (var i = 0; i < indices.length; i++) {
              tmpArr.push (elements[indices[i]]);
           }
           combination = tmpArr.join (";");
           selectionCombinations.push (combination);
        }
        return selectionCombinations;
    },
    onHide: function() {
        var self = this;
        self.timer.cx.disconnect();
        self.change_cx.disconnect();
    },
    deal_change: function() {
        var self = this;
        self.asinsForSelection();
        self.update();
    },
    update: function() {
        var self = this;
        self.updateImage();
        self.updatePrice();
        self.updateSelectionBoxes();
        self.updateBuyButton();
        self.updateStatusBox();
        self.updateProgressBar();
        self.updateTimeRemaining();
    },
    image: function() {
        var self = this;
        self.img = Deal.DOM.img();
        self.updateImage();
        return Deal.DOM.div(null, [self.img]);
    },
    updateImage: function() {
        var self = this;
        var src = self.imageURLForCurrentSelection();
        if (!src) {
            src = gbResources.getImage('no_image') ||
                'http://g-ecx.images-amazon.com/images/G/01/x-site/icons/no-img-sm.gif';
        } else {
            src = src.replace(/\.((_.*_)\.)?(gif|jpg)$/, '.$2_AA120_.$3');
        }
        self.img.src = src;
    },
    imageURLForCurrentSelection: function() {
        var self = this;
        var i;
        if (self.selectedAsin) {
            return self.selectedAsin.imageURL;
        }
        
        var imageURL = null;
        for (i=0; i<self.selectedAsins.length; i++) {
            if (imageURL) {
                if (imageURL != self.selectedAsins[i].imageURL) {
                    imageURL = null;
                    break;
                }
            } else {
                imageURL = self.selectedAsins[i].imageURL;
            }
        }
        if (imageURL) {
            return imageURL;
        }
        
        for (var k in self.selection) {
            var v = self.selection[k];
            imageURL = self.imageURLForSelection(k,v);
            if (imageURL) {
                return imageURL;
            }
        }
        return  self.deal.detail.imageAsin;
    },
    imageURLForSelection: function(k, v) {
        var self = this;
        var imageURL;
        for (var i=0; i<self.deal.asins.length; i++) {
            var asin = self.deal.asins[i];
            if (asin.variationData[k] != v) {
                continue;
            }
            if (imageURL) {
                if (imageURL != asin.imageURL) {
                    return null;
                }
            } else {
                imageURL = asin.imageURL;
            }
        }
        return imageURL;
    },
    progressBar: function() {
        var self = this;
        self.progressBarInner = Deal.DOM.div({
            style:'position:absolute;'+
                'background-color:#C9D7E4;'+
                'height:19px;'
        });
        self.progressBarText = Deal.DOM.div({
            style:'font-size: 9px;'+
                'overflow:hidden;'+
                'position:absolute;'+
                'padding:2px 0 0 0;'+
                'text-align:center;'+
                'vertical-align:middle;'+
		'width:100%'
        });
        self.progressBarOuter = Deal.DOM.div({
            style:'border:1px solid #C9D7E4;'+
                'height: 19px;'+
                'position: relative;'+
                'margin-top:10px;'+
                'width: 118px;'
        }, [self.progressBarInner, self.progressBarText]);
        self.updateProgressBar();
        return self.progressBarOuter;
    },
    updateProgressBar: function() {
        var self = this;
        if (self.deal.limitedQuantity) {
            if (self.selectedAsins.length == self.deal.asins.length) {
                self.showPercentClaimed(self.deal.status.percentClaimed);
            } else if (self.selectedAsin) {
                self.showPercentClaimed (
                    self.selectedAsin.status.offerServiceSoldOut
					  ? 100
					  : self.selectedAsin.status.percentClaimed);
            } else {
                self.showPercentClaimed(null);
            }
        } else {
            self.showPercentClaimed(null);
        }
    },
    showPercentClaimed: function(percentClaimed) {
        var self = this;
        percentClaimed = Math.round(percentClaimed);
        if (percentClaimed != null) {
            self.progressBarOuter.style.visibility = '';
            self.progressBarInner.style.width = percentClaimed+'%';
            self.progressBarText.innerHTML =
		window.gbResources.getString('gbd_percent_now_claimed', {percent: percentClaimed});
        } else {
            self.progressBarOuter.style.visibility = 'hidden';
        }
    },
    timeRemaining: function() {
        var self = this;
        self.timer_div = Deal.DOM.div({
            style:'font-size:9px;'+
                'text-align:center; margin-top: 5px;'
        });
        self.updateTimeRemaining();
        return self.timer_div;
    },
    updateTimeRemaining: function() {
        var self = this;
        if (self.timer) {
            self.timer.cx.disconnect();
        }
        if (self.deal.status.ended) {
            self.timer_div.innerHTML = window.gbResources.getString('csld-expired_status');
            self.timer = null;
        } else {
            var deal = self.deal;
            self.timer = Deal.Timer(deal.status.endDate);
            self.timer.span.id = 'time-remaining-'+deal.dealID;
            self.timer.span.style.fontWeight = 'bold';
            Deal.DOM.replaceChildren(self.timer_div, [
	        window.gbResources.getString('csld_remaining')+" ",
		self.timer.span,
		" "+window.gbResources.getString('csld_remaining_part2') //'remaining'
            ]); 
        }
    },
    title: function() {
        var self = this;
        return Deal.DOM.span({style:'font-weight:bold'},
            [self.deal.detail.title]);
    },
    selector: function() {
        var self = this;
        var asins = self.deal.asins;
        self.options = {};
        self.color_images = {};
        for (var i=0; i<asins.length; i++) {
            var vars = asins[i].variationData;
            for (var key in vars) {
                var option = self.options[key];
                if (option === undefined) {
                    self.options[key] = option = {};
                }
                option[vars[key]] = 1;
                if (key == 'Color') {
                    self.color_images[key] = asins[i].imageURL;
                }
            }
        }
        var dropdowns = [];
        var colorDropDown = undefined;
        for (var key in self.options) {
            
            if (key == 'Color') {
                //colorDropDown = self.colorSelector(key);
                colorDropDown = self.dropdownSelector(key);
            } else {
                dropdowns.push(self.dropdownSelector(key));
            }       
        }
        if (colorDropDown != undefined) {
            dropdowns.push(colorDropDown);
        }
        return Deal.DOM.div(null, dropdowns);
    },
    
    colorSelector: function(key) {
    },
    dropdownSelector: function(key) {
        var self = this;
        var select_options = [Deal.DOM.option(null, [""])];
	select_options[0].value = 'Select';
	select_options[0].text = window.gbResources.getString('csld-select');
        var values = [];
        for (var value in self.options[key]) {
            values.push(value);
        }
        values.sort(self.numOrderAsc);
        if (self.dropDownOptions[key] == undefined) {
            self.dropDownOptions[key] = [];
        }
        for (var i=0; i<values.length; i++) {
            var opt = Deal.DOM.option(null, [values[i]]);
            select_options.push(opt);
            self.dropDownOptions[key].push(opt);
        }
        var select = self.selectors[key] ||
             Deal.DOM.select(null, select_options);
        if (!self.selectors[key]) {
            self.selectors[key] = select;
        }
        self.selectionDropDownElements[key] = select;
        select.onchange = function() {
            self.selectionChange(key, self.selectors[key][select.selectedIndex].value, self.selectors[key][select.selectedIndex].text);
        };
        self.selection_span[key] = Deal.DOM.span({style:'color:#E47911'});
        return Deal.DOM.div({style:'margin-top: 10px'}, [
            Deal.DOM.span({style:'font-weight: bold; font-size: 13px;'}, [
                gbResources.getString ('csld-common-select_key', {'key': key}),
                self.selection_span[key]]),
                Deal.DOM.br(),
                select]);
    },
    isCurrentlyValidOption: function (key, value) {
        var self = this;
        if (self.validOptions &&
            self.validOptions[key] &&
            self.validOptions[key][value] == 1) {
            return true;
        }
        return false;
    },
    resetAllOtherOptions: function (key) {
        var self = this;
        for (var k in self.selectionDropDownElements) {
            if (k == key) {
                continue;
            }
            var selectionDropDownElement = self.selectionDropDownElements[k];
            if (selectionDropDownElement) {
                selectionDropDownElement.selectedIndex=0;
                selectionDropDownElement.onchange();
            }
        }
    },
    selectionChange: function(key, value, text) {
        var self = this;
        if (value != 'Select') {
            var clearOtherSelections = false;
            if (!self.isCurrentlyValidOption (key, text)) {
                clearOtherSelections = true;
            }
            self.currentSelections[key] = text;
            self.selection[key] = text;
            jQuery (self.selection_span[key])
              .html (text);
            if (clearOtherSelections) {
                self.resetAllOtherOptions (key);
            }
        } else {
            delete self.currentSelections[key];
            delete self.selection[key];
            jQuery (self.selection_span[key])
              .html ('');
        }
        self.asinsForSelection();
        self.updateDropDownStyles(key, text);
        self.update();
    },
    getAllCombinations: function() {
        var self = this;
        for (var i = 0; i < self.deal.asins.length; i++) {
            var asin = self.deal.asins[i];
            var varData = asin.variationData;
            
            var sortedKeys = self.getSortedKeys (varData);
            var keyValues = new Array();
            for (var x = 0; x < sortedKeys.length; x++) {
                var sKey = sortedKeys[x];
                var sValue = sKey + ":" + varData[sKey];
                keyValues.push(sValue);
            }
            var combinedArray = self.combine (keyValues);
            for (var x = 0; x < combinedArray.length; x++) {
                combinedArray[x] = combinedArray[x].join(";");
                var joined = combinedArray[x];
                if (!self.allValidCombinations[joined]) {
                    self.allValidCombinations[joined] = new Array();
                }
                self.allValidCombinations[joined].push (asin);
            }
        }
    },
    numOrderAsc: function(a, b) {
	
	var intA = parseInt(a);
	var intB = parseInt(b);
	
	if ( isNaN(intA) && isNaN(intB) ) {
	    if (a > b) {
		return 1;
	    } else if (a < b) {
		return -1;
	    } else {
		return 0;
	    }
	} else if ( isNaN(intA) ) {
	    
	    return 1;
	} else if ( isNaN(intB) ) {
	    
	    return -1;
	} else {
	    
	    if ( intA > intB ) {
		return 1;
	    } else if ( intA < intB ) {
		return -1;
	    } else {
		return 0;
	    }
	}
    },
    getSortedKeys: function(list) {
        var keys = [];
        for (var key in list) {
            keys.push(key);
        }
        keys.sort();
        return keys;
    },
    asinsForSelection: function() {
        var self = this;
        self.selectedAsins = [];
        for (var i=0; i<self.deal.asins.length; i++) {
            var asin = self.deal.asins[i];
            var match = true;
            for (var sk in self.selection) {
                if (asin.variationData &&
                    asin.variationData[sk] != self.selection[sk]) {
                    match = false;
                    break;
                }
            }
            if (match) {
                self.selectedAsins.push(asin);
            }
        }
        
        self.selectedAsins = self.uniqueAsinArray (self.selectedAsins);
        if (self.selectedAsins.length == 1) {
            self.selectedAsin = self.selectedAsins[0];
            self.selection = {};
            for (var k in self.selectedAsin.variationData) {
                self.selection[k] = self.selectedAsin.variationData[k];
            }
            self.updateSelection();
            if (self.selectedAsin.status.percentClaimed < 100
                && !self.selectedAsin.offerServiceSoldOut
                && !self.deal.status.ended
                && self.deal.status.percentClaimed < 100
            ) {
                self.available = true;
            } else {
                self.available = false;
            }
        } else {
            self.selectedAsin = null;
            self.available = false;
            self.updateSelection();
        }
    },
    uniqueAsinArray: function (arr) {
        var self = this;
        var tmpHash  = {};
        var tmpArray = [];
        if (!arr) {
            return tmpArray;
        }
        for (var i = 0; i < arr.length; i++) {
            var asin = arr[i];
            var asinString = asin.asin;
            tmpHash[asinString] = asin;
        }
        var uniqueSortedKeys = self.getSortedKeys (tmpHash);
        for (var i = 0; i < uniqueSortedKeys.length; i++) {
            var key   = uniqueSortedKeys[i];
            var value = tmpHash[key];
            tmpArray.push (value);
        }
        return tmpArray;
    },
    updateSelection: function() {
        var self = this;
        for (var k in self.selection_span) {
            if ( self.selection[k] != undefined ) {
                jQuery (self.selection_span[k])
                  .html (self.selection[k]);
	        } else {
                jQuery (self.selection_span[k])
                  .html ('');
	        }
        }
        for (var k in self.selectors) {
	    self.selectors[k].value = self.selection[k] || '';
	    
	    if ( self.selection[k] && !self.selectors[k].value ) {
		for (var i=0; i<self.selectionDropDownElements[k].options.length; i++) { 
		    if ( self.selectionDropDownElements[k].options[i].text
			 == self.selection[k] ) {
			self.selectors[k].selectedIndex = i;
		    }
		}
	    }
        }
    },
    updateDropDownStyles: function(pKey, pValue) {
        var self = this;
        self.getValidOptions();
        for (var k in self.dropDownOptions) {
            for (var l = 0; l < self.dropDownOptions[k].length; l++) {
                var select = self.dropDownOptions[k][l];
                if (select == null) {
                    continue;
                }
		
                var value = select.value || select.text;
                if ((self.currentSelections.length <= 1
		     && k == pKey && value == pValue) ||
                    (self.validOptions[k] &&
                     self.validOptions[k][value] == 1))
                {
                    select.setAttribute("style", "color: #000000;");
		    
		    if ( !select.value ) {
			select.style.setAttribute("color", "#000000");
		    }
                } else {
                    select.setAttribute("style", "color: #afafaf;");
		    
		    if ( !select.value ) {
			select.style.setAttribute("color", "#afafaf");
		    }
                }
            }
        }
    },
    getValidOptions: function() {
        var self = this;
        self.validOptions = {};
        self.selectableAsins = self.getSelectableAsins();
        for (var k = 0; k < self.selectableAsins.length; k++) {
            var asin = self.selectableAsins[k];
            if (asin == null) {
                continue;
            }
            for (var varName in asin.variationData) {
                var varValue = asin.variationData[varName];
                if (self.validOptions[varName] == undefined) {
                    self.validOptions[varName] = {};
                }
                self.validOptions[varName][varValue] = 1;
            }
        }
    },
    getSelectableAsins: function() {
        var self = this;
        var selectableAsins = [];
        var sortedKeys = self.getSortedKeys (self.currentSelections);
        
        
        if (sortedKeys.length == 0) {
            return self.selectedAsins;
        }
        var keyValues = [];
        for (var i = 0; i < sortedKeys.length; i++) {
            var key   = sortedKeys[i];
            var value = self.currentSelections[key];
            var sValue = key + ":" + value;
            keyValues.push (sValue);
        }
        var depth = sortedKeys.length;
        var tmpDropDownKeys = self.getSortedKeys (self.dropDownOptions);
        var totalVariationalOptionNames = tmpDropDownKeys.length;
        if (depth >= totalVariationalOptionNames) {
            depth = totalVariationalOptionNames - 1;
        }
        var combinedArray = self.getSelectionCombinations (keyValues, depth);
        var tmpAsinHash = {};
        
        for (var i = 0; i < combinedArray.length; i++) {
            var key = combinedArray[i];
            var tmpAsins = self.allValidCombinations[key];
            if (tmpAsins && tmpAsins.length > 0) {
                for (var j = 0; j < tmpAsins.length; j++) {
                    var tmpAsin = tmpAsins[j];
                    if (tmpAsin) {
                        var asinString = tmpAsin.asin;
                        tmpAsinHash[asinString] = tmpAsin;
                    }
                }
            }
        }
        var sortedKeys = self.getSortedKeys (tmpAsinHash);
        for (var i = 0; i < sortedKeys.length; i++) {
            var key   = sortedKeys[i];
            var value = tmpAsinHash[key];
            selectableAsins.push (value);
        }
        return selectableAsins;
    },
    price: function() {
        var self = this;
        self.priceBlock = Deal.DOM.div({style:'margin-top: 10px'});
        self.updatePrice();
        return self.priceBlock;
    },
    updatePrice: function() {
        var self = this;
        if (self.selectedAsin) {
            self.updatePriceSingleAsin();
        } else if (self.selectedAsins.length > 1) {
            self.updatePriceRange();
        } else {
            self.updatePriceNoAsins();
        }
    },
    updatePriceSingleAsin: function() {
        var self = this;
        var asin = this.selectedAsin;
        if (asin.offerServiceSoldOut || !asin.dealPrice || !asin.dealPrice.price) {
            self.updatePriceNoAsins();
            return;
        }
        var listPrice = asin.listPrice;
        var ourPrice = asin.ourPrice;
        var dealPrice = asin.dealPrice;
        var listPriceDiscount = Deal.Price.minus(listPrice, dealPrice);
        var ourPriceDiscount = Deal.Price.minus(ourPrice, dealPrice);
        var percentOffListPrice =
          Deal.formatPricePercentage
            (Deal.Price.percent_off (listPrice, dealPrice));
        var percentOffOurPrice =
          Deal.formatPricePercentage
            (Deal.Price.percent_off (ourPrice, dealPrice));
        var listPriceFormatted = Deal.Price.format(listPrice);
        var ourPriceFormatted = Deal.Price.format(ourPrice);
        var dealPriceFormatted = Deal.Price.format(dealPrice);
        var listPriceDiscountFormatted = Deal.Price.format(listPriceDiscount);
        var ourPriceDiscountFormatted = Deal.Price.format(ourPriceDiscount);
        var prices = [];
        prices.push(
            Deal.DOM.span({
                id:'list-price-popover',
                style:'font-size: 11px;'+
                    'color: #666666;'+
                    'text-decoration: line-through;'
            }, [listPriceFormatted || ourPriceFormatted]));
        prices.push(' ');
        prices.push(Deal.DOM.span({
            id: 'deal-price-popover',
            style:'font-size: 13px;'+
                'color: #990000;'
        }, [dealPriceFormatted]));
        prices.push(' ');
        prices.push(
            Deal.DOM.span({
                id:'percent-off-popover',
                style:'font-size: 11px;'+
                    'color: #990000;'
	    }, [ window.gbResources.getString('csld-percent_off',
		       {discountPercentage: (percentOffListPrice || percentOffOurPrice)}) ]));
        Deal.DOM.replaceChildren(self.priceBlock, prices);
    },
    updatePriceRange: function() {
        var self = this;
        var min = null;
        var max = null;
        for (var i=0; i<self.selectedAsins.length; i++) {
            var asin = self.selectedAsins[i];
            if (asin.status.percentClaimed >= 100
                || asin.offerServiceSoldOut
                || !asin.dealPrice
                || !asin.dealPrice.price
            ) {
                continue;
            }
	    
	    var asinPrice = parseFloat(asin.dealPrice.price);
	    if ( !max || asinPrice > parseFloat(max.price) ) {
		max = asin.dealPrice;
	    }
	    if ( !min || asinPrice < parseFloat(min.price) ) {
		min = asin.dealPrice;
	    }
        }
        if (!min || !max) {
            self.updatePriceNoAsins();
        } else {
            if (min == max) {
                Deal.DOM.replaceChildren(self.priceBlock, [
                    Deal.DOM.span({style:'color:#900;font-size:13px'}, [
                        Deal.Price.format(min)])]);
            } else {
                Deal.DOM.replaceChildren(self.priceBlock, [
                    Deal.DOM.span({style:'color:#900;font-size:13px'}, [
                        Deal.Price.format(min), '-',
                        Deal.Price.format(max)])]);
            }
        }
    },
    updatePriceNoAsins: function() {
        var self = this;
        var options = [];
        for (var k in self.selection) {
            options.push(
                Deal.DOM.span({style:'font-weight: bold'}, [
                    k, ": ",
                    Deal.DOM.span({style:'color:#B00'}, [
                        self.selection[k]])]));
            options.push(Deal.DOM.br());
        }
	/*  Commenting out for now. This functionality needs to be made
	    available if/when we update the selection boxes to swatches.
	    Leaving in place since this is working code, but not to be 
	    used yet.
        if (options.length > 0) {
            Deal.DOM.replaceChildren(self.priceBlock, [
                Deal.DOM.div({
                    style:'border: 1px solid #900;'+
                        'color: #900;'+
                        'text-align: center;'+
                        'background-color: #EBB;'+
                        'padding: 10px;'
                }, [
                    "Sorry, this item is not available in",
                    Deal.DOM.br(),
                    options,
                    "at the Lightning Deal price."
                ])]);
        } else {
            Deal.DOM.replaceChildren(self.priceBlock, [
                Deal.DOM.div({
                    style:'border: 1px solid #900;'+
                        'color: #900;'+
                        'text-align: center;'+
                        'background-color: #EBB;'+
                        'padding: 10px;'
                }, [
                    "Sorry, this item is not available",
                    Deal.DOM.br(),
                    "at the Lightning Deal price."
                ])]);
        }
	*/
    },
    updateSelectionBoxes: function() {
        var self = this;
        var disable = false;
        if (self.cx.buying[self.deal.dealID]) {
            disable = true;
        }
        for (var key in self.selectors) {
            var selector = self.selectors[key];
            selector.disabled = disable;
        }
    },
    buyButton: function() {
        var self = this;
        self.buy_button = Deal.DOM.img({
            style:'cursor:pointer;' +
            	'display: inline;',
            src:gbResources.getImage('add_to_cart')});
        self.buyButtonContainer = Deal.DOM.div({},
				      self.buy_button);
        self.updateBuyButton();
        return self.buyButtonContainer;
    },
    updateBuyButton: function() {
        var self = this;
        if (self.cx.buying[self.deal.dealID]) {
            self.showBuying();
        } else {
            self.showBuyButton();
        }
    },
    showBuyButton: function() {
        var self = this;
        var selectedAsinPurchaseState =
	    Deal.getPurchaseState(null, self.selectedAsin);
        var cartMsg = null;
	var statusContent = null;
	if ( window.gbResources.getFeature('waitlist') && self.selectedAsin &&
	     selectedAsinPurchaseState == Deal.waitInLineStr ) { 
	    
	    self.buy_button.src = gbResources.getImage('add_to_cart'); 
	    self.buy_button.alt = window.gbResources.getString('csld-add_to_cart');
	    self.buy_button.onclick = null; 
	    self.buy_button.style.opacity = 0.5; 
	    self.buy_button.style.cursor = 'default'; 
	    
            self.buy_button.style.filter = "alpha(opacity=50)"; 
	    statusContent = Deal.DOM.div({'style':'font-weight: bold;'+ 
					  'font-size: 11px;'}, 
				[window.gbResources.getString('gbd_this_option_waitlisted')]); 
	} else if (window.gbResources.getFeature('timed-checkout') && self.selectedAsin && 
		   selectedAsinPurchaseState == Deal.inCartStr) { 
        if (self.selectedAsin.status.purchaseStatus.msToExpiry > 0) {
	         self.buy_button.src = gbResources.getImage('add_to_cart'); 
	         self.buy_button.alt = window.gbResources.getString('csld-add_to_cart');
                 self.buy_button.onclick = null;
                 self.buy_button.style.opacity = 0.5;
	         self.buy_button.style.cursor = 'default';
	         
	         self.buy_button.style.filter = "alpha(opacity=50)";
                 cartMsg = Deal.DOM.span({'style':'font-weight: bold;'+
					  'font-size: 13px;'},
			       [' ' + window.gbResources.getString('gbd_in_your_cart')]);
	         statusContent = self.getStatusContent(false);
        } else {
	        Deal.DOM.replaceChildren(self.buyButtonContainer, [ 
	             Deal.DOM.img({ 
	        	  id:'buying-'+self.deal.dealID, 
	        	  alt: window.gbResources.getString('csld-checking_deal_status'),
	        	  style: 'display: inline;',
	        	  src:gbResources.getImage ('spinner')
	             }),  
	             Deal.DOM.span({ 
	        	  style:'color: #E68221;'+ 
	        		'font-weight: bold;'+ 
	        		    'font-size: 10px;' },
	        	  [window.gbResources.getString('csld-checking_deal_status_alt')]) 
	             ]); 
	        self.buy_button.onclick = null; 
            return;
        }
        } else if (self.selectedAsin && self.available &&
		   !Deal.isClaimed (null, self.selectedAsin) || 
		   (window.gbResources.getFeature('waitlist') && 
		    selectedAsinPurchaseState == Deal.pendingAtcStr)) { 
            if (self.selectedAsin.status.purchaseStatus.msToExpiry > 0 ||
                self.selectedAsin.status.purchaseStatus.state == Deal.expiredStr ||
                self.selectedAsin.status.purchaseStatus.state == Deal.availableStr) {
	            self.buy_button.src = gbResources.getImage('add_to_cart'); 
	            self.buy_button.alt = window.gbResources.getString('csld-add_to_cart');
	            self.buy_button.style.opacity = 1.0; 
	            
	            self.buy_button.style.filter = "alpha(opacity=100)"; 
	            self.buy_button.style.cursor = 'pointer'; 
	            
	            if ( selectedAsinPurchaseState == Deal.pendingAtcStr ) { 
		        statusContent = self.getStatusContent(true); 
	            } 
	            self.buy_button.onclick =  function(event) { 
		        if (event) { 
		            event.stopPropagation(); 
		            event.preventDefault(); 
		        } 
		        self.cx.buy(self.deal, self.selectedAsin.asin, false); 
		        self.showBuying(); 
		        self.updateSelectionBoxes(); 
                        return false; 
	            }; 
            } else {
	            Deal.DOM.replaceChildren(self.buyButtonContainer, [ 
	                 Deal.DOM.img({ 
	            	  id:'buying-'+self.deal.dealID, 
	            	  alt: window.gbResources.getString('csld-checking_deal_status'),
	            	  style: 'display: inline;',
	            	  src:gbResources.getImage ('spinner')
	                 }),  
	                 Deal.DOM.span({ 
	            	  style:'color: #E68221;'+ 
	            		'font-weight: bold;'+ 
	            		    'font-size: 10px;' },
	        	  [window.gbResources.getString('csld-checking_deal_status_alt')]) 
	                 ]); 
	            self.buy_button.onclick = null; 
                return;
            }
	} else if ( window.gbResources.getFeature('waitlist') && self.selectedAsin && 
		    self.selectedAsin.status.percentSoldOut < 100 &&
		    self.selectedAsin.status.percentClaimed >= 100 ) { 
	    
	    
	    self.buy_button.src = gbResources.getImage('join_waitlist'); 
	    self.buy_button.alt = window.gbResources.getString('join_waitlist'); 
	    if ( self.selectedAsin.status.currentlyUnavailable ) {
    		//If the waitlist is full - we show the wait list full button
	    	self.buy_button.alt = window.gbResources.getString('gbd_waitlist_full');
    	   	self.buy_button.src = gbResources.getImage('waitlist_full');	    	
	    	self.buy_button.style.opacity = 0.5;
                self.buy_button.style.filter = "alpha(opacity=50)";
		self.buy_button.onclick = null;
		self.buy_button.style.cursor = 'default';
	    } else {
		self.buy_button.style.opacity = 1.0;
		
		self.buy_button.style.filter = "alpha(opacity=100)";
		self.buy_button.style.cursor = 'pointer';
		self.buy_button.onclick =  function(event) {
		    if (event) {
			event.stopPropagation();
			event.preventDefault();
		    }
		    self.cx.buy(self.deal, self.selectedAsin.asin, true);
		    self.showBuying();
		    self.updateSelectionBoxes();
		    return false;
		};
	    }
        } else {
	    self.buy_button.src = gbResources.getImage('add_to_cart'); 
	    self.buy_button.alt = window.gbResources.getString('csld-add_to_cart');
            self.buy_button.onclick = null;
            self.buy_button.style.opacity = 0.5;
	    self.buy_button.style.cursor = 'default';
	    
	    self.buy_button.style.filter = "alpha(opacity=50)";
        }
	Deal.DOM.replaceChildren(self.buyButtonContainer,
				 [self.buy_button,
				  cartMsg,
				  statusContent]);
    },
    getStatusContent: function(pending) { 
	var self = this; 
	var statusContent = null; 
	if ( self.deal.pStatus == undefined ||
	     self.deal.pStatus[self.selectedAsin.asin] == undefined ) { 
	    self.deal.pStatus = []; 
	    self.deal.pStatus[self.selectedAsin.asin] = 
		new Deal.PStatus(self.deal); 
	} 
	var tmpPStatus = self.deal.pStatus[self.selectedAsin.asin]; 
	statusContent = 
	    tmpPStatus.getTimerMessage(self.selectedAsin.asin, null, pending); 
	return statusContent; 
    }, 
    showBuying: function() {
        var self = this;
        jQuery(self.statusBoxObject).css("padding-left",50);
        Deal.DOM.replaceChildren(self.buyButtonContainer, [
                    Deal.DOM.img({
                        id:'buying-'+self.deal.dealID,
                        alt: window.gbResources.getString('csld-checking_deal_status'),
                        style: 'display: inline;',
                        src:gbResources.getImage ('spinner')
                    }), 
                    Deal.DOM.span({
                        style:'color: #E68221;'+
                            'font-weight: bold;'+
                            'font-size: 10px;'
		    }, [window.gbResources.getString('csld-checking_deal_status_alt')])
                ]);
                self.buy_button.onclick = null;
    },
    statusBox: function() {
        var self = this;
        self.statusBoxObject =
          Deal.DOM.span({'style': 'padding-left: 10px; font-weight: bold; font-size: 13px; position: relative; top: -18px; left: 100px;'},
                        Deal.DOM.text(''));
        self.updateStatusBox();
        return self.statusBoxObject;
    },
    updateStatusBox: function() {
        var self = this;
        var statusMessage = "";
        if (self.selectedAsin != undefined) {
	    if (Deal.inState(null, self.selectedAsin, Deal.isClaimedStr)) { 
		statusMessage = window.gbResources.getString('csld-claimed'); 
	    } else if (!Deal.inState(null, self.selectedAsin, Deal.pendingAtcStr) && 
		       !Deal.inState(null, self.selectedAsin, Deal.inCartStr) && 
		       !Deal.inState(null, self.selectedAsin, Deal.waitInLineStr) && 
               !Deal.inState(null,self.selectedAsin,Deal.availableStr) &&
               !Deal.inState(null,self.selectedAsin,Deal.expiredStr) &&
		       !self.available) { 
                statusMessage = window.gbResources.getString('csld-sold_out');
            }
        }
        self.statusBoxObject.innerHTML = statusMessage;
    },
    combine: function(a) {
      var fn = function(n, src, got, all) {
        if (n == 0) {
          if (got.length > 0) {
            all[all.length] = got;
          }
          return;
        }
        for (var j = 0; j < src.length; j++) {
          fn(n - 1, src.slice(j + 1), got.concat([src[j]]), all);
        }
        return;
      };
      var all = [];
      for (var i=0; i < a.length; i++) {
        fn(i, a, [], all);
      }
      all.push(a);
      return all;
    }
});
})();}

var DealContentUtil = Deal.Class({
    __init__: function(p) {
        var self = this;
        self.displayingData  = p.displayingData;
        self.onClickFunction = p.onClickFunction;
        self.buyFunction     = p.buyFunction;
        self.notifier        = p.notifier;
        
        self.timers = {};
        
        self.addToCartButtons = {};
        
        self.refTagPrefix = 'xs_gb_ld_tck_';
        
        self.headerStrings = {};
        
        
        self.setHeaderStrings();
        
        
        self.asinCategoryData = {};
        
        for (var stateAlertEnum in Deal.stateAlertsEnum) {
            self.asinCategoryData[Deal.stateAlertsEnum[stateAlertEnum]] = [];
        }
        
        self.categorizeAsins();
    },
    setHeaderStrings: function() {
        var self = this;
        self.headerStrings[Deal.stateAlertsEnum.ATC_EXPIRES_SOON] =
          {
          'singular': gbResources.getString ('dn-begin_checking_out_singular'),
          'plural':   gbResources.getString ('dn-begin_checking_out_plural')
          };
        self.headerStrings[Deal.stateAlertsEnum.ATC_EXPIRED] =
          {
          'singular': gbResources.getString ('dn-time_ran_out_on_singular'),
          'plural':   gbResources.getString ('dn-time_ran_out_on_plural')
          };
        self.headerStrings[Deal.stateAlertsEnum.WL_PATC] =
          {
           'singular': gbResources.getString ('dn-deal_is_avail_singular'),
           'plural':   gbResources.getString ('dn-deal_is_avail_plural')
          };
        self.headerStrings[Deal.stateAlertsEnum.WL_PATC_EXPIRED] =
          {
           'singular': gbResources.getString ('dn-time_to_claim_ran_out_singular'),
           'plural': gbResources.getString ('dn-time_to_claim_ran_out_plural')
          };
        self.headerStrings[Deal.stateAlertsEnum.WL_SOLD_OUT] =
          {
           'singular': gbResources.getString ('dn-deal_sold_out_singular'),
           'plural':   gbResources.getString ('dn-deal_sold_out_plural')
          };
        self.headerStrings[Deal.stateAlertsEnum.WL_DEAL_ENDED] =
          {
           'singular': gbResources.getString ('dn-deal_has_ended_singular'),
           'plural':   gbResources.getString ('dn-deal_has_ended_plural')
          };
    },
    
    
    onClickA: function(url, children) {
        var self = this;
        var link = Deal.DOM.a ({'href': '#'}, children);
        jQuery(link).click (function() {
                                
                                if (self.onClickFunction) {
                                    self.onClickFunction();
                                }
                                
                                jQuery (window.location).attr('href', url);
                            });
        return link;
    },
    
    
    
    categorizeAsins: function() {
        var self = this;
        for (var asin in self.displayingData) {
            var data = self.displayingData[asin];
            var deal           = data.deal;
            var stateAlertEnum = data.stateAlertEnum;
            var dealAsin = Deal.findDealAsin(asin, deal);
            if (dealAsin == null) {
                continue;
            }
            if (self.asinCategoryData[stateAlertEnum]) {
                self.asinCategoryData[stateAlertEnum].push
                  ({'dealAsin': dealAsin,
                    'deal': deal
                   }
                  );
            } else {
                self.log ("Unrecognized stateAlertEnum found: " +
                          stateAlertEnum);
                continue;
            }
        }
    },
    
    getImageUrl: function (dealAsin) {
        var self = this;
        var src = dealAsin.imageURL;
        if (!src) {
            src = gbResources.getImage ('no_image');
        } else {
            src = Deal.resizeImage (src, 50);
        }
        
        src = Deal.checkAndSetSSLImageUrl (src);
        return src;
    },
    
    
    getImage: function (dealAsin) {
        var self = this;
        var imageUrl = self.getImageUrl (dealAsin);
        var imageLink = self.onClickA (self.getUrl (dealAsin),
                                    [
                                     Deal.DOM.img ({src: imageUrl,
                                                    border: 0})
                                    ]);
        var imageContainer =
          Deal.DOM.div ({style: 'background-color: #ffffff;'+
                                'border: 1px solid #dddac0;'+
                                'width: 54px;'+
                                'height: 54px;'+
                                'vertical-align: middle;'+
                                'text-align: center;'
                        },
                        [ imageLink ]);
        return imageContainer;
    },
    
    getPriceBlock: function (dealAsin) {
        var self = this;
        var listPrice  = Deal.Price.format (dealAsin.listPrice, null);
        var ourPrice   = Deal.Price.format (dealAsin.ourPrice,  null);
        var dealPrice  = Deal.Price.format (dealAsin.dealPrice, null);
        var compPrice = listPrice;
        if (compPrice == null) {
            compPrice = ourPrice;
        }
        var div = Deal.DOM.div({});
        if (compPrice) {
            div.appendChild (
              Deal.DOM.span ({'style': 'color: #666666;'+
                                       'font-size: 11px;'+
                                       'font-family: Verdana;'+
                                       'text-decoration: line-through;'+
                                       'white-space: nowrap;'
                             },
                             [compPrice]));
        }
        if (dealPrice) {
            var dealPriceSpan =
                Deal.DOM.span ({'style': 'color: #cc0000;'+
                                'font-size: 11px;'+
                                'font-family: Verdana;'+
                                'text-decoration: none;'+
                                'padding-left: 4px;'+
                                'white-space: nowrap;'
                }, [dealPrice]
            );
            
            
            
            if (gbResources.getCustomerData ('realm') != 'US') {
                div.appendChild(Deal.DOM.br());
                dealPriceSpan.style.paddingLeft = 0;
            }
            div.appendChild (dealPriceSpan);
        }
        return div;
    },
    
    
    
    getVariationString: function (dealAsin) {
        var self = this;
        var variationString = '';
        var arr = [];
        if (dealAsin.variationData) {
            for (var key in dealAsin.variationData) {
                arr.push (dealAsin.variationData[key]);
            }
        }
        if (arr.length > 0) {
            variationString = '(' + arr.join (', ') + ')';
        }
        return variationString;
    },
    
    
    
    getTitle: function (dealAsin, deal) {
        var self = this;
        var titleText = deal.detail.title || '(No Title)';
        var variationString = self.getVariationString (dealAsin);
        titleText += ' ' + variationString;
        var maxLength = 80;
        var truncated = titleText;
        if (titleText.length > maxLength) {
            var str = titleText.substr(0, maxLength);
            var words = str.split(' ');
            words[words.length-1] = '';
            truncated = words.join(' ');
            truncated = truncated.replace(/[^\w\d]*$/, '');
            truncated = truncated.substr(0, truncated.length - 1) + '...';
        }
        var link = self.onClickA (self.getUrl (dealAsin),
                                  [ truncated ]);
        jQuery (link).css (
          {'font-family': 'Verdana',
           'font-size': '11px',
           'text-decoration': 'none'
          }
        );
        return link;
    },
    
    getUrl: function (dealAsin) {
        var self = this;
        return '/gp/product/'+dealAsin.asin + '/ref=' +
               self.refTagPrefix + dealAsin.dealID;
    },
    getViewMoreUrl: function (dealAsin, deal) {
        var self = this;
        var dealID = '';
        var ref = '/ref=';
        if (dealAsin) {
            dealID = dealAsin.dealID;
        }
        
        
        var redirUrl = '';
        if (gbResources.getCustomerData ('realm') == 'US') {
            redirUrl = '/gp/goldbox/all-deals';
        } else {
            redirUrl = deal.detail.buyBoxUrl;
            
            if (redirUrl.match(/\/$/)) {
                ref = 'ref=';
            }
        }
        return redirUrl + ref + self.refTagPrefix + dealID;                 
    },
    
    getTimeLeftBlock: function (dealAsin, deal) {
        var self = this;
        
        var endDateMs =
            dealAsin.status.purchaseStatus.expiresDate.getTime();
        var expiresDate = new Date (endDateMs);
        self.timers[dealAsin.asin] =
          Deal.CheckoutTimer (expiresDate, true);
        return Deal.DOM.div ({'style': 'font-size: 28px;'+
                                       'color: #009900;'+
                                       'font-family: Arial,Helvetica,Sans-Serif;'+
                                       'font-weight: bold;'+
                                       'text-align: right;'+
                                       'line-height: 24px;'
                             },
                             [ self.timers[dealAsin.asin].span,
                               Deal.DOM.br(),
                               Deal.DOM.span({'style': 'font-size: 11px;'+
                                                       'font-family: Verdana;'+
                                                       'color: #666666;'+
                                                       'font-weight: normal;'+
                                                       'line-height: 16px;'},
                                             
                                             [ gbResources.getString ('csld_remaining_part2') ])
                             ]);
    },
    
    
    getHeader: function (state, regularHeader, numOfDeals) {
        var self = this;
        var plurality = 'singular';
        if (numOfDeals > 1) {
            plurality = 'plural';
        }
        var headerString = self.headerStrings[state][plurality];
        if (headerString == undefined) {
            headerString = self.headerStrings[Deal.stateAlertsEnum.ATC_EXPIRES_SOON];
        }
        var div = Deal.DOM.div ({style: 'position: static;'+
                                        'top: 14px;'+
                                        'width: 100%;'+
                                        'margin-right: 10px;'
                                },
                                [ self.getAlertSprite(),
                                  Deal.DOM.span ({style:'font-weight: bold;'+
                                                        'font-size: 11px;'+
                                                        'font-family: Verdana;'
                                                  },
                                      [ Deal.DOM.text (headerString) ])
                                ]
                               );
        return div;
    },
    
    
    
    getAlertSprite: function() {
        var self = this;
        var div = Deal.DOM.div 
          ({style: 'background-image: url(' + gbResources.getImage ('alerts') + ');' +
                   'background-repeat: no-repeat;'+
                   'background-position: -60px -188px;'+
                   'height: 30px;'+
                   'width: 30px;'+
                   'float: left;'+
                   'margin-right: 5px;'
           },
           []);
        return div;
    },
    
    getViewCartButton: function() {
        var self = this;
        var link = self.onClickA ('/gp/cart/view.html/ref=' +
                                  self.refTagPrefix + 'atc',
                               [ 
                                Deal.DOM.img ({src: gbResources.getImage ('view_cart_checkout'),
                                               border: 0,
                                               style: 'padding-bottom: 10px;'
                                              })
                               ]
                              );
        return link;
    },
    
    
    expiredMessage: function (dealAsin) {
        var self = this;
        //'To see current price and availability,  '
        var expiredString = gbResources.getString ('dn-see_current_price_avail');
        //"visit the product's detail page.";
        var expiredLinkString = gbResources.getString ('dn-visit_detail_page'); 
        var expiredSpan =
          Deal.DOM.span ({'style': 'font-size: 11px;'+
                                   'font-family: Verdana;'},
            [ Deal.DOM.text (expiredString + ' '),
              self.onClickA (self.getUrl (dealAsin),
                         [Deal.DOM.text (expiredLinkString)
                         ]
                        )
            ]);
        return expiredSpan;
    },
    
    getDealTableExpired: function (dealAsin, deal) {
        var self = this;
        var dealTable =
          Deal.DOM.table ({width: '100%',
                           cellpadding: 0,
                           cellspacing: 0,
                           style: 'margin: 10px 0'},
                          [
                           Deal.DOM.tr ({'style': 'vertical-align: top;'},
                             
                             [Deal.DOM.td ({'style': 'vertical-align: top;'+
                                                     'padding-right: 10px;'},
                                [ self.getImage (dealAsin) ]
                              ),
                              
                              Deal.DOM.td ({'style': 'vertical-align: top;'},
                                [ self.expiredMessage (dealAsin) ]
                              )
                             ]
                           )
                          ]);
        return dealTable;
    },
    
    
    getDealTableExpiresSoon: function (dealAsin, deal) {
        var self = this;
        var table = self.getDealTable (dealAsin, deal, false);
        return table;
    },
    getAtcButton: function (dealAsin, deal) {
        var self = this;
        self.addToCartButtons[dealAsin.asin] = Deal.DOM.div();
        var atcButton =
          Deal.DOM.img ({src: gbResources.getImage ('add_to_cart'),
                         alt: 'Add to Cart',
                         style: 'cursor: pointer;'
                        });
        self.setAtcOnClick (atcButton, dealAsin.asin);
        Deal.DOM.replaceChildren (self.addToCartButtons[dealAsin.asin],
          [ atcButton ]);
        return self.addToCartButtons[dealAsin.asin];
    },
    setAtcOnClick: function (element, asin) {
        var self = this;
        element.onclick = function (event) {
            if (event) {
                event.stopPropagation();
                event.preventDefault();
            }
            self.notifier.buy (asin,
              function() {
                  self.setErrorAtcButton (asin);
              });
            self.showProgress (asin);
            return false;
        }
    },
    setErrorAtcButton: function (asin) {
        var self = this;
        
        var problemStr  = gbResources.getString ('dn-problem_atc');
        
        var tryAgainStr = gbResources.getString ('dn-try_again');
        var tryAgainBtn =
          Deal.DOM.span({'style': 'text-decoration: underline;'+
                                  'color: #004B91;'+
                                  'cursor: pointer;'
                        },
                        [ tryAgainStr ]
          );
        self.setAtcOnClick (tryAgainBtn, asin);
        if (self.addToCartButtons[asin] == undefined) {
            return;
        }
        Deal.DOM.replaceChildren (self.addToCartButtons[asin],
         [Deal.DOM.span ({'style': 'font-size: 11px;'+
                                   'font-weight: bold;'},
                         [ problemStr ]),
          tryAgainBtn
         ]
        );
    },
    showProgress: function (asin) {
        var self = this;
        if (!self.addToCartButtons[asin]) {
            return;
        }
        Deal.DOM.replaceChildren (self.addToCartButtons[asin],
          [
           Deal.DOM.img({
               alt:gbResources.getString ('csld-checking_deal_status_alt'),
               src:gbResources.getImage ('spinner')
           }),
           Deal.DOM.span({
               style:'color: #E68221;'+
                   'font-weight: bold;'+
                   'font-size: 10px;'+
                   'padding-left: 5px;'
           }, [gbResources.getString ('csld-checking_deal_status')])
          ]
        );
    },
    getDealTable: function (dealAsin, deal, atc) {
        var self = this;
        var atcRow = null;
        if (atc) {
            atcRow = Deal.DOM.tr ({'style': 'vertical-align: top;'+
                                            'padding-top: 10px;'+
                                            'text-align: left;'},
             [ Deal.DOM.td ({'style': 'text-align: left;'+
                                      'padding-top: 10px;',
                             'colspan': '3'},
                   [self.getAtcButton (dealAsin, deal) ])
             ]
            );
        }
        var dealTable = Deal.DOM.table ({width: '100%',
                                         cellpadding: 0,
                                         cellspacing: 0,
                                         style: 'margin: 10px 0'
                                        },
          [Deal.DOM.tr ({'style': 'vertical-align: top;'},
              
             [Deal.DOM.td ({'style': 'vertical-align: top;'},
                [ self.getImage (dealAsin) ]
              ),
              
              Deal.DOM.td ({'style': 'vertical-align: top;'+
                                     'padding-left: 10px;'+
                                     'padding-right: 10px;'},
                [ Deal.DOM.span ({}, [ self.getTitle (dealAsin, deal) ]),
                  Deal.DOM.br (),
                  self.getPriceBlock (dealAsin)
                ]
              ),
              
              Deal.DOM.td ({'style': 'vertical-align: top;'},
                [ self.getTimeLeftBlock (dealAsin, deal) ]
              )
             ]),
             atcRow
          ]);
        return dealTable;
    },
    
    
    getExpiresSoonContent: function (haveExpiredContent) {
        var self = this;
        var content = self.getContent (Deal.stateAlertsEnum.ATC_EXPIRES_SOON,
                                       haveExpiredContent); 
        
        
        if (self.asinCategoryData[Deal.stateAlertsEnum.ATC_EXPIRES_SOON].length != 0) {
            content.appendChild (self.getViewCartButton());
        }
        return content;
    },
    
    
    getExpiredContent: function() {
        var self = this;
        return self.getContent (Deal.stateAlertsEnum.ATC_EXPIRED);
    },
    
    
    getContent: function (eStateAlert, regularHeader) {
        var self = this;
        var contentDiv = Deal.DOM.div();
        var dataArray =
          self.asinCategoryData[eStateAlert];
        if (dataArray.length == 0) {
            return contentDiv;
        }
        
        contentDiv.appendChild
          (self.getHeader (eStateAlert, regularHeader, dataArray.length));
        
        
        dataArray.sort (self.sortByAsinTimes);
        for (var i = 0; i < dataArray.length; i++) {
            var data = dataArray[i];
            var dealAsin = data.dealAsin;
            var deal     = data.deal;
            var table = null;
            
            switch (eStateAlert) {
                case Deal.stateAlertsEnum.ATC_EXPIRES_SOON:
                    table = self.getDealTableExpiresSoon (dealAsin, deal);
                break;
                case Deal.stateAlertsEnum.ATC_EXPIRED:
                    table = self.getDealTableExpired (dealAsin, deal);
                break;
                case Deal.stateAlertsEnum.WL_PATC:
                    table =
                      self.getDealTableWaitListPendingATC (dealAsin, deal);
                break;
                case Deal.stateAlertsEnum.WL_PATC_EXPIRED:
                    table =
                      self.getDealTableWaitListPendingATCExpired
                        (dealAsin, deal);
                break;
                case Deal.stateAlertsEnum.WL_SOLD_OUT:
                    table = self.getDealTableWaitListSoldOut (dealAsin, deal);
                break;
                case Deal.stateAlertsEnum.WL_DEAL_ENDED:
                    table = self.getDealTableWaitListDealEnded (dealAsin, deal);
                break;
                default:
            }
            if (table != null) {
                contentDiv.appendChild (table);
            }
        }
        
        
        if (eStateAlert == Deal.stateAlertsEnum.ATC_EXPIRES_SOON &&
            dataArray.length > 0) {
            contentDiv.appendChild (self.getViewCartButton());
        }
        return contentDiv;
    },
    getDealTableWaitListPendingATC: function (dealAsin, deal) {
        var self = this;
        var table = self.getDealTable (dealAsin, deal, true);
        return table;
    },
    getDealTableWaitListPendingATCExpired: function (dealAsin, deal) {
        var self = this;
        
        var seeIfString = gbResources.getString ('dn-see_if_deal_avail');
        var rhContentDiv =
          Deal.DOM.span ({'style': 'font-size: 11px;'},
                        [self.onClickA (self.getUrl (dealAsin),
                                        [ seeIfString ])
                        ]
                       );
        var table = self.twoColumnTable (dealAsin, deal, rhContentDiv);
        return table;
    },
    twoColumnTable: function (dealAsin, deal, rightHandContent) {
        var self = this;
        var table =
          Deal.DOM.table ({width: '100%',
                           cellpadding: 0,
                           cellspacing: 0,
                           style: 'margin: 10px 0'},
                           [
                            Deal.DOM.tr ({'style': 'vertical-align: top;'},
                             
                             [Deal.DOM.td ({'style': 'vertical-align: top;'+
                                                     'padding-right: 10px;'},
                                [ self.getImage (dealAsin) ]
                              ),
                              
                              Deal.DOM.td ({'style': 'vertical-align: top;'},
                               [ rightHandContent ]
                              )
                             ]
                            )
                           ]
                          );
          return table;
    },
    getDealTableWaitListSoldOut: function (dealAsin, deal) {
        var self = this;
        var table =
            self.twoColumnTable(dealAsin, deal, self.wlSoldOutText(dealAsin, deal));
        return table;
    },
    getDealTableWaitListDealEnded: function (dealAsin, deal) {
        var self = this;
        var table =
          self.twoColumnTable (dealAsin, deal, self.wlDealEndedText (dealAsin));
        return table;
    },
    wlDealEndedText: function (dealAsin) {
        var self = this;
        
        var ldEndAt  = gbResources.getString ('dn-all_deals_ended');
        
        var readMore = gbResources.getString ('dn-read_more_help');
        var dealID = '';
        if (dealAsin) {
            dealID = dealAsin.dealID;
        }
        var helpUrl = gbResources.getString('csld-help_link') +
            '&ref=' + self.refTagPrefix + dealID;
        var span =
          Deal.DOM.span ({},
           [ldEndAt,
            self.onClickA (helpUrl, [ readMore ])
           ]
          );
        return span;
    },
    wlSoldOutText: function (dealAsin, deal) {
        var self = this;
        
        var toSeeCurrent = gbResources.getString ('dn-price_avail_1') + ' ';
        
        var visitTheDp = gbResources.getString ('dn-price_avail_2');
        
        var viewMore = gbResources.getString ('dn-price_avail_3');
        var span = 
            Deal.DOM.span ({},
                [Deal.DOM.text(toSeeCurrent),
                 self.onClickA(self.getUrl(dealAsin), [ visitTheDp ]),
                 Deal.DOM.text(gbResources.getString('dn-price_avail_4')),
                 Deal.DOM.text(' '),
                 self.onClickA(self.getViewMoreUrl(dealAsin, deal), [ viewMore ]),
                 Deal.DOM.text('.')
                ]
          );
        return span;
    },
    threeColumnTable: function (dealAsin, deal, middleContent, rightContent) {
        var self = this;
        var table =
          Deal.DOM.table ({width: '100%',
                           cellpadding: 0,
                           cellspacing: 0,
                           style: 'margin: 10px 0'},
                           [
                            Deal.DOM.tr ({'style': 'vertical-align: top;'},
                             
                             [Deal.DOM.td ({'style': 'vertical-align: top;'+
                                                     'padding-right: 10px;'},
                                [ self.getImage (dealAsin) ]
                              ),
                              
                              Deal.DOM.td ({'style': 'vertical-align: top;'+
                                                     'padding-left: 10px;'+
                                                     'padding-right: 10px;'},
                               [ middleContent ]
                              ),
                              
                              Deal.DOM.td ({'style': 'vertical-align: top;'},
                               [ rightContent ]
                              )
                             ]
                            )
                           ]
                          );
          return table;
    },
    
    getAlertContent: function() {
        var self = this;
        var finalDiv = Deal.DOM.div ({'class': 'lightningDealAlertBox',
                                      'width': '100%'});
        
        
        var alertStateOrder =
          [
           Deal.stateAlertsEnum.WL_PATC,
           Deal.stateAlertsEnum.ATC_EXPIRES_SOON,
           Deal.stateAlertsEnum.ATC_EXPIRED,
           Deal.stateAlertsEnum.WL_PATC_EXPIRED,
           Deal.stateAlertsEnum.WL_SOLD_OUT,
           Deal.stateAlertsEnum.WL_DEAL_ENDED
          ];
        for (var i = 0; i < alertStateOrder.length; i++) {
            var alertState = alertStateOrder[i];
            var contentDiv = self.getContent (alertState);
            if (contentDiv) {
                finalDiv.appendChild (contentDiv);
            }
        }
        return finalDiv;
    },
    sortByAsinTimes: function(a, b) {
	    var x = a.dealAsin.status.purchaseStatus.expiresDate;
	    var y = b.dealAsin.status.purchaseStatus.expiresDate;
	    return x-y;
    }
});
var DealNotifier = Deal.Class({
    __init__: function(p) {
        var self = this;
        self.dealExpirationConnections = {};
        self.dealExpiresSoonConnections = {};
        if (window.navbar == null ||
            window.navbar.getLightningDealsData == null ||
            typeof window.navbar.getLightningDealsData != 'function') {
            self.log ("Error: navbar is not defined, cannot continue!");
            return;
        }
        self.lightningDealsData = window.navbar.getLightningDealsData();
        self.asinDates     = {};
        self.cartAsins     = self.getCartAsins();
        self.waitlistAsins = {};
        self.warningThresholdOffset = p.thresholdOffset;
        self.wlexp                  = p.wlexp;
        self.sessionId = p.sessionId;
        self.now       = parseInt (p.now, 10);
        self.popupSkin = p.popupSkin;
        self.debug     = p.debug || false;
        self.alertPopover          = null;
        self.alertPopoverContainer = null;
        self.seenInfo = {};
        self.onHideData = [];
        self.displayingData = {};
        if (!self.warningThresholdOffset) {
            self.warningThresholdOffset = 'C';
        }
        self.active = false;
        self.deals = {};
        self.asins = {};
        self.currentAsinStates = {};
        self.watchDeals        = {};
        self.displayedExpired           = {};
        self.displayedExpiresSoon       = {};
        self.displayedPendingATC        = {};
        self.displayedPendingATCExpired = {};
        self.displayedWaitListSoldOut   = {};
        self.asinStatesEnum =
          {INITIALIZE: 0,
           CHECK_SEEN: 1,
           CALL_DS: 2,
           DISPLAY: 3
          };
        
        
        self.asinStatePriority = {};
        self.asinStatePriority[Deal.inCartStr]     = 6;
        self.asinStatePriority[Deal.pendingAtcStr] = 4;
        self.asinStatePriority[Deal.waitInLineStr] = 3;
        self.asinStatePriority[Deal.expiredStr]    = 2;
        self.asinStatePriority[Deal.availableStr]  = 1;
        self.asinStatePriority[Deal.claimedStr]    = 0;
        self.stateStrings = {};
        self.stateStrings[Deal.stateAlertsEnum.ATC_EXPIRES_SOON] = 'expires_soon';
        self.stateStrings[Deal.stateAlertsEnum.ATC_EXPIRED]      = 'expired';
        self.stateStrings[Deal.stateAlertsEnum.WL_PATC]          = 'wl_patc';
        self.stateStrings[Deal.stateAlertsEnum.WL_PATC_EXPIRED]  = 'wl_patc_expired';
        self.stateStrings[Deal.stateAlertsEnum.WL_SOLD_OUT]      = 'wl_sold_out';
        self.stateStrings[Deal.stateAlertsEnum.WL_DEAL_ENDED]    = 'wl_deal_ended';
        
        Deal.Service.base_retry_interval = 30000;
        Deal.Service.continue_requests   = true;
        
        self.service = new Deal.Service({
            marketplace_id: self.getMarketplaceId() || 1,
            customer_id: self.getCustomerId(),
            session_id: self.getSessionId(),
            timeout: 10 * 60 * 1000,
            includeVariations: true
        });
        
        self.buying = {};
        
        self.updateInterval = 30000;
        
        self.windowInterval = null;
        
        
        if (!self.getCustomerId()) {
            self.log ("Customer is not recognized, shutting down.");
            
            return;
        }
        
        if (self.hasLightningDeals()) {
            self.registerAsinTimeouts();
        }
        
        
        self.registerWaitListDeals();
        self.log ("DealNotifier instantiated.");
    },
    registerWaitListDeals: function() {
        var self = this;
        if (!self.wlexp) {
            return;
        }
        self.getWaitListedAsins (
          function (result) {
              var waitlistedAsins = result.waitlistedAsins;
              var hasWaitlistAsins = false;
              for (var i = 0; i < waitlistedAsins.length; i++) {
                  var asin = waitlistedAsins[i];
                  
                  self.waitlistAsins[asin] = {};
                  hasWaitlistAsins = true;
              }
              
              
              if (hasWaitlistAsins) {
                  self.getDealsForWaitlistAsins.apply (self);
              }
          },
          function (error) {
              self.log ("Error getting WaitList info: " + error);
          }
        );
    },
    getDealsForWaitlistAsins: function() {
        var self = this;
        var asins = [];
        for (var asin in self.waitlistAsins) {
            asins.push (asin);
        }
        if (asins.length == 0) {
            self.log ("No WaitListed ASINs, not calling GetDeals.");
            return;
        }
        self.getDeals (asins,
          function (result) {
              
              
              var returnedDealAsins = {};
              var jsonDeals = result.deals;
              if (jsonDeals == null) {
                  self.log ("No Deals found in GetDeals response.  Returning.");
                  return;
              }
              for (var x = 0; x < jsonDeals.length; x++) {
                  var jsonDeal = jsonDeals[x];
                  var deal = new Deal.Model.Deal (jsonDeal.dealID);
                  deal.load_from_deal (jsonDeal);
                  var asins = deal.asins;
                  if (asins == null) {
                      self.log ("Asins list for Deal (" + deal.dealID +
                                ") is null - skipping.");
                      continue;
                  }
                  for (var i = 0; i < asins.length; i++) {
                      var tmpAsin = asins[i];
                      
                      if (self.waitlistAsins[tmpAsin.asin] != undefined) {
                          if (tmpAsin.status == null ||
                              tmpAsin.status.purchaseStatus == null ||
                              tmpAsin.status.purchaseStatus.state == null) {
                              self.log ("Empty PurchaseStatus or State, skipping: " + tmpAsin.asin);
                              self.stopWatchingWaitlistAsin (tmpAsin.asin);
                              continue;
                          }
                          var pState     = tmpAsin.status.purchaseStatus.state;
                          var pStateType = Deal.pStateTypeMap[pState];
                          if (pStateType != Deal.pStateTypeEnum.WAITLIST &&
                              pStateType != Deal.pStateTypeEnum.EITHER) {
                              self.log ("DealAsin isn't in a WaitList state, skipping: " + tmpAsin.asin +'; pState: ' + pState + '; type: ' + pStateType);
                              self.stopWatchingWaitlistAsin (tmpAsin.asin);
                              continue;
                          }
                          returnedDealAsins[tmpAsin.asin] = 1;
                          var lastUpdated =
                            tmpAsin.status.purchaseStatus.lastUpdated;
                          self.waitlistAsins[tmpAsin.asin] =
                            {'dealId': deal.dealID,
                             'lastUpdated': lastUpdated
                            };
                          self.asinDates[tmpAsin.asin] = lastUpdated;
                          self.cartAsins[tmpAsin.asin] =
                            {ASIN: tmpAsin.asin,
                             discountExpirationDate: lastUpdated
                            };
                          self.registerDeal.apply (self,
                            [tmpAsin.asin, deal]);
                      }
                  }
              }
              
              
              for (var watchAsin in self.waitlistAsins) {
                  
                  
                  if (!returnedDealAsins[watchAsin]) {
                      self.log ("GetDeals didn't return an ASIN we requested, removing it from our watch list: " + watchAsin);
                      self.stopWatchingWaitlistAsin (watchAsin);
                  }
              }
              self._activate.apply (self);
          },
          function (error) {
              self.log ("Error calling GetDeals for WaitListed Deals.");
          }
        );
    },
    registerWaitlistDeal: function (asin, deal) {
        var self = this;
        self.log ("Registering waitlist deal: " + asin);
        if (self.watchDeals[asin]) {
            self.log ("Already watching ASIN: " + asin +
                      "; replacing with new one.");
            delete self.watchDeals[asin];
        }
        self.watchDeals[asin] = deal;
        self.examineWaitListDeal (asin, deal);
        self._activate();
    },
    
    
    examineWaitListDeal: function (asin, deal) {
        var self = this;
        
        if (deal == null || asin == null) {
            self.log ("Deal or ASIN is null, returning.");
            return;
        }
        var dealAsin = Deal.findDealAsin (asin, deal);
        
        if (dealAsin == null) {
            self.log ("No DealAsin found, returning.");
            return;
        }
        
        self.getNotificationInfo (asin,
          self.cartAsins[asin].discountExpirationDate,
          function (result) {
              var stateAlert = null;
              var purchaseState = dealAsin.status.purchaseStatus.state;
              
              self.registerSeenInfo (asin, result.seen);
              if (purchaseState == Deal.pendingAtcStr) {
                  stateAlert = Deal.stateAlertsEnum.WL_PATC;
                  
                  
                  if (dealAsin.status.purchaseStatus.msToExpiry <= 0) {
                      stateAlert = Deal.stateAlertsEnum.WL_PATC_EXPIRED;
                  }
              } else if (purchaseState == Deal.expiredStr) {
                  stateAlert = Deal.stateAlertsEnum.WL_PATC_EXPIRED;
              } else if (purchaseState == Deal.waitInLineStr) {
                  
                  
                  if (parseInt (dealAsin.status.percentSoldOut, 10) >= 100 ||
                      parseInt (dealAsin.status.offerServiceSoldOut)) {
                      stateAlert = Deal.stateAlertsEnum.WL_SOLD_OUT;
                  } else {
                      
                      
                      return;
                  }
              } else {
                  
                  
                  self.stopWatchingWaitlistAsin (asin);
                  return;
              }
              var stateString = self.getStateString (stateAlert);
              var ack         = self.seenInfo[asin][stateString];
              if (ack == true) {
                  self.log ("Customer has already seen an alert for: " + asin +
                            "; state: " + stateString + ". Not showing alert.");
                  return;
              }
              
              if (purchaseState == Deal.pendingAtcStr) {
                  deal.connect ('pstatus_expire',
                      function (deal, asinString) {
                          self.handleStateExpiration
                            (deal, asinString,
                             Deal.stateAlertsEnum.WL_PATC_EXPIRED);
                          self.stopWatchingWaitlistAsin (asinString);
                      });
              }
              self.displayAlert (asin, stateAlert);
          },
          function (error) {
              self.log ("Error getting Wait List info: " + error);
          }
        );
    },
    
    
    
    _activate: function() {
        var self = this;
        if (self.active) {
            self.log ("DealNotifier._activate() was called but it's already active.");
            return;
        }
        if (!self.getCustomerId()) {
            self.log ("DealNotifier cannot activate without a CustomerID.");
            return;
        }
        if (!self.getSessionId()) {
            self.log ("DealNotifier cannot activate without a SessionID.");
            return;
        }
        self.windowInterval =
          window.setInterval(function() {
                              self.updateWaitlistDeals.apply (self);
                             }, self.updateInterval);
        self.active = true;
        self.log ("DealNotifier activated.");
    },
    
    
    _deactivate: function() {
        var self = this;
        if (!self.active) {
            self.log ("DealNotifier._deactivate() was called but it's already inactive.");
            return;
        }
        self.windowInterval = window.clearInterval (self.windowInterval);
        self.active = false;
        self.log ("DealNotifier deactivated.");
    },
    
    
    
    updateWaitlistDeals: function() {
        var self = this;
        self.log ("Checking for Deals to Update");
        var dealIds = self._getDealIdsFromWaitlistAsins();
        
        if (dealIds.length == 0) {
                self.log ("No more Wait Listed ASINs, shutting down.");
                self._deactivate();
            return;
        }
        self.getDealAsinStatuses (
          function (result) {
              var asinStatuses = result.dealAsinStatuses;
              for (var i = 0; i < asinStatuses.length; i++) {
                  var asinStatus = asinStatuses[i];
                  var dealId = asinStatus.dealID;
                  var asin   = asinStatus.asin;
                  if (self.waitlistAsins[asin] != null &&
                      self.waitlistAsins[asin].dealId == dealId) {
                      self.watchDeals[asin].load_from_asin_status (asinStatus);
                      
                      
                      self.examineWaitListDeal (asin, self.watchDeals[asin]);
                  } else {
                      self.log ("Not a Waitlist ASIN: " + asin);
                  }
              }
          },
          function (error) {
              self.log ("GetDealAsinStatus: FAILURE: " + error);
          }
        );
    },
    
    
    registerAsinTimeouts: function() {
        var self = this;
        for (var asin in self.cartAsins) {
            var cartAsin = self.cartAsins[asin];
            var discountExpirationDate =
              parseInt (cartAsin.discountExpirationDate, 10);
            self.registerAsin (asin, discountExpirationDate);
        }
    },
    
    
    registerAsin: function (asin, discountExpirationDate) {
        var self = this;
        self.currentAsinStates[asin] = self.asinStatesEnum.INITIALIZE;
        var timeLapse =
          self.getTimeUntilWarn (discountExpirationDate, self.now);
        self.log ("TimeLapse: " + timeLapse);
        window.setTimeout
          (function() {
              var callBack = self.nextFunction (asin);
              callBack.apply (self, [asin]);
           },
           
           timeLapse * 1000);
        self.log ("ASIN Registered: " + asin);
    },
    /*
     * This is the central chaining method that is used to determine 
     * which method is next in the call chain.
     */
    nextFunction: function (asin) {
        var self = this;
        var stateTransitions = {};
        
        
        stateTransitions[self.asinStatesEnum.INITIALIZE] =
            self.asinStatesEnum.CHECK_SEEN;
        stateTransitions[self.asinStatesEnum.CHECK_SEEN] =
            self.asinStatesEnum.CALL_DS;
        stateTransitions[self.asinStatesEnum.CALL_DS] =
            self.asinStatesEnum.DISPLAY;
        stateTransitions[self.asinStatesEnum.DISPLAY] = null;
        var currentState = self.currentAsinStates[asin];
        var newState     = stateTransitions[currentState];
        
        self.currentAsinStates[asin] = newState;
        
        switch (self.currentAsinStates[asin]) {
            case self.asinStatesEnum.INITIALIZE:
                
                return function() {};
            break;
            case self.asinStatesEnum.CHECK_SEEN:
                
                
                return self.checkIfSeen;
            break;
            case self.asinStatesEnum.CALL_DS:  
                
                
                
                return self.callGetDeals;
            break;
            case self.asinStatesEnum.DISPLAY:  
                
                
                
                return self.displayAlert;
            break;
            default:
                
                return function() {};
        }
    },
    
    
    checkIfSeen: function (asin) {
        var self = this;
        self.log ("Checking if Customer has seen Alert for ASIN: " + asin);
        var cartAsin = self.cartAsins[asin];
        var dealExpirationDate = cartAsin.discountExpirationDate;
        self.getNotificationInfo (asin, dealExpirationDate,
          function (result) {
              
              
              
              
              
              if (result.seen.expired != true) {
                  self.registerSeenInfo (asin, result.seen);
                  var callBack = self.nextFunction (asin);
                  callBack.apply (self, [asin]);
              }
          },
          function (error) {
              
              
              
              
              self.seenInfo[asin] = {
                  expires_soon: false,
                  expired: false
              };
              var callBack = self.nextFunction (asin);
              callBack.apply (self, [asin]);
          }
        );
    },
    
    
    callGetDeals: function (asin) {
        var self = this;
        self.getDeals ([asin],
         function (result) {
            for (var i = 0; i < result.deals.length; i++) {
                var jsonDeal = result.deals[i];
                var deal = new Deal.Model.Deal (jsonDeal.dealID);
                
                deal.purchaseStatusWarningThreshold =
                  self.getWarningThreshold();
                deal.load_from_deal (jsonDeal);
                var watchDeal = false;
                if (deal.asins == null) {
                	return;
                }
                
                for (var x = 0; x < deal.asins.length; x++) {
                	var dealAsin = deal.asins[x];
                	
                	if (dealAsin.asin != asin) {
                		self.log ("ASINs don't match for DealID: " +
                				jsonDeal.dealID + ": " + dealAsin.asin +
                				" != " + asin + "(original) (SKIPPING)");
                		continue;
                	}
                	
                	
                	if (dealAsin.status.purchaseStatus.state == 'InCart' ||
                			dealAsin.status.purchaseStatus.state == 'Expired') {
                		
                		
                		self.registerDeal (asin, deal);
                		
                		return;
                	} else {
                		self.log ("Deal status is not 'InCart': " + dealAsin.status.purchaseStatus.state);
                	}
                }                
            }
         },
         function (error) {
            self.log ("Error calling GetDeals: " + error);
         }
        );
    },
    
    
    displayAlert: function (asin, stateAlertEnum) {
        var self = this;
        var deal = self.watchDeals[asin];
        
        if (deal == null) {
            self.log ("ERROR, displayAlert was called for an ASIN with no Deal!"
                      +" ASIN: " + asin);
            return;
        }
        var alreadyDisplayed = self.getDisplayed (asin, stateAlertEnum);
        if (alreadyDisplayed != true) {
            
            self.addOnHideData (asin, stateAlertEnum);
            
            self.createOrAddAlert (asin, deal, stateAlertEnum);
        } else {
            self.log ("Already displayed Alert for: " + deal.dealID +
                      "; " + asin);
        }
        self.setDisplayed (asin, stateAlertEnum);
    },
    
    
    insertDisplayingData: function (asin, deal, stateAlertEnum) {
        var self = this;
        if (asin == null || deal == null || stateAlertEnum == null) {
            self.log ("Error inserting DisplayingData, asin, deal, or stateAlertEnum is null.");
            return;
        }
        self.displayingData[asin] =
          { 'deal': deal,
            'stateAlertEnum': stateAlertEnum
          };
    },
    
    getDisplayingData: function () {
        var self = this;
        return self.displayingData;
    },
    
    
    getDisplayed: function (asin, stateAlertEnum) {
        var self = this;
        var alreadyDisplayed = false;
        switch (stateAlertEnum) {
            case Deal.stateAlertsEnum.ATC_EXPIRES_SOON:
                alreadyDisplayed =
                  self.displayedExpiresSoon[asin] == 1 ? true : false;
            break;
            case Deal.stateAlertsEnum.ATC_EXPIRED:
                alreadyDisplayed =
                  self.displayedExpired[asin] == 1 ? true : false;
            break;
            case Deal.stateAlertsEnum.WL_PATC:
                alreadyDisplayed =
                  self.displayedPendingATC[asin] == 1 ? true : false;
            break;
            case Deal.stateAlertsEnum.WL_PATC_EXPIRED:
                alreadyDisplayed =
                  self.displayedPendingATCExpired[asin] == 1 ? true : false;
            break;
            case Deal.stateAlertsEnum.WL_SOLD_OUT:
                alreadyDisplayed =
                  self.displayedWaitListSoldOut[asin] == 1 ? true : false;
            break;
            self.log ("already displayed: " + asin +
              "; stateAlertEnum: " + self.getStateString(stateAlertEnum));
            default:
        }
        return alreadyDisplayed;
    },
    
    
    setDisplayed: function (asin, stateAlertEnum) {
        var self = this;
        switch (stateAlertEnum) {
            case Deal.stateAlertsEnum.ATC_EXPIRES_SOON:
                self.displayedExpiresSoon[asin] = 1;
            break;
            case Deal.stateAlertsEnum.ATC_EXPIRED:
                self.displayedExpired[asin] = 1;
            break;
            case Deal.stateAlertsEnum.WL_PATC:
                self.displayedPendingATC[asin] = 1;
            break;
            case Deal.stateAlertsEnum.WL_PATC_EXPIRED:
                self.displayedPendingATCExpired[asin] = 1;
            break;
            case Deal.stateAlertsEnum.WL_SOLD_OUT:
                self.displayedWaitListSoldOut[asin] = 1;
            break;
            default:
        }
    },
    
    
    
    createOrAddAlert: function (asin, deal, stateAlertEnum) {
        var self = this;
        self.log ("Called createOrAddAlert for: " + asin + "; " + deal.dealID);
        
        
        self.insertDisplayingData (asin, deal, stateAlertEnum);
        var content = self.getPopupContent();
        var discountExpirationDate = self.asinDates[asin];
        
        if (self.alertPopoverContainer == null) {
            self.alertPopoverContainer =
                Deal.DOM.div({'id': 'dealPopoverAlertContainer'}); 
            self.alertPopoverContainer.appendChild (content);
        }
        
        if (self.alertPopover == null) {
            
            self.alertPopover =
              jQuery.AmazonPopover.displayPopover
                ({showCloseButton: true,
                  skin: self.popupSkin,
                  literalContent: self.alertPopoverContainer,
                  modal: false,
                  draggable: false,
                  width: 335,
                  cacheable: false,
                  onHide: function(popover) {
                       self.handleOnHide.apply (self, []);
                  },
                  location:
                    function (popover, settings) {
                        
                        
                        
                        return {
                            left: jQuery(window).scrollLeft() +
                                  jQuery(window).width() -
                                  popover.outerWidth() - 10,
                            top: 10
                        };
                    }
                 });
            
            
            
            if (self.alertPopover) {
                jQuery (window).resize (function() {
                    self.handleWindowResize();
                });
                
                
                if (jQuery.browser.msie) {
                    
                    self.handleWindowResize();
                    
                    
                    jQuery (window).scroll(function() {
                        self.handleWindowResize();
                    });
                } else {
                    
                    self.alertPopover.css ('position', 'fixed');
                }
            }
        } else {
            
            
            var tmpContainer = self.alertPopover.find('.ap_content');
            if (tmpContainer) {
                tmpContainer.html (content);
            }
        }
        var tmpContainer = self.alertPopover.find('.ap_content');
        if (tmpContainer) {
            tmpContainer.css ('padding-top', '0px');
        }
    },
    
    
    
    handleWindowResize: function() {
        var self = this;
        if (self.alertPopover) {
            self.alertPopover.css ('left', jQuery(window).scrollLeft() +
                                           jQuery(window).width() -
                                           self.alertPopover.outerWidth() - 10);
            
            
            if (jQuery.browser.msie) {
                self.alertPopover.css ('top', jQuery(window).scrollTop() + 10);
            } else {
                self.alertPopover.css ('top', 10);
            }
        }
    },
    
    
    
    
    
    handleOnHide: function (asinString) {
        var self = this;
        for (var i = 0; i < self.onHideData.length; i++) {
            var data = self.onHideData[i];
            var asin = data.asin;
            var discountExpirationDate = data.discountExpirationDate;
            var state = data.stateAlertEnum;
            
            
            if (asinString != undefined &&
                asin != asinString) {
                continue;
            }
            self.setNotificationInfo.apply
              (self, [asin, discountExpirationDate, state]);
        }
        
        self.onHideData = [];
        
        self.displayingData = {};
        
        self.alertPopover = null;
        
        self.alertPopoverContainer = null;
    },
    
    getPopupContent: function() {
        var self = this;
        var dealContentUtil =
          new DealContentUtil ({displayingData: self.displayingData,
                                notifier: self,
                                onClickFunction: function (asinString) {
                                  self.handleOnHide.apply (self, [asinString]);
                                }
                              });
        var content = dealContentUtil.getAlertContent();
        return content;
    },
    
    
    registerDeal: function (asin, deal) {
        var self = this;
        
        if (!self.getCustomerId()) {
            self.log ("Error: Cannot register a deal if the customer is not "+
                      "recognized.");
            return;
        }
        
        if (!self.getSessionId()) {
            self.log ("Error: Cannot register a deal if the customer has no "+
                      "SessionID.");
        }
        
        if (asin == null || deal == null) {
            self.log ("Error: registerDeal(): Must provide both an asin and a Deal object.");
            return;
        }
        var dealAsin = Deal.findDealAsin (asin, deal);
        
        if (dealAsin == null) {
            self.log ("Error: couldn't find corresponding DealAsin for Deal: " +
                      deal.dealID + "; ASIN: " + asin);
            return;
        }
        
        if (dealAsin.status == null) {
            self.log ("Error: DealAsinStatus is null for Deal: " +
                      deal.dealID + "; ASIN: " + asin);
            return;
        }
        var purchaseState = dealAsin.status.purchaseStatus.state;
        
        if (purchaseState == null) {
            self.log ("Error: PurchaseState is null for Deal: " +
                      deal.dealID + "; ASIN: " + asin);
            return;
        }
        
        if (purchaseState == Deal.availableStr ||
            purchaseState == Deal.claimedStr) {
            self.log ("Purchase state is Available or Claimed.  Ignoring.");
            return;
        }
        var stateType = Deal.pStateTypeMap[purchaseState];
        
        
        if (!self.watchDeals[asin]) {
            var func = self.getRegisterFunction (dealAsin);
            if (func != null) {
                
                
                self.setDealAndDateData (asin, deal);
                
                func.apply (self, [asin, deal]);
            }
        } else {
            
            var currentDeal     = self.watchDeals[asin];
            var currentDealAsin = Deal.findDealAsin (asin, currentDeal);
            var currentPurchaseState =
              currentDealAsin.status.purchaseStatus.state;
            
            var currentPriority  = self.asinStatePriority[currentPurchaseState];
            var incomingPriority = self.asinStatePriority[purchaseState];
            if (currentPriority == null || incomingPriority == null) {
                self.log ("Error: Priorities for deal are null.");
                return;
            }
            if (currentPriority >= incomingPriority) {
                self.log ("Incoming DealAsinPurchaseState has a lower priority"+
                          " than the current one, ignoring: Deal: " +
                          deal.dealID + "; ASIN: " + asin);
                return;
            }
            
            
            if (self.waitlistAsins[asin]) {
                self.stopWatchingWaitlistAsin (asin);
            } else {
                
                self.stopWatchingCartAsin (asin);
            }
            
            delete self.watchDeals[asin];
            var func = self.getRegisterFunction (dealAsin);
            if (func != null) {
                
                
                self.setDealAndDateData (asin, deal);
                
                func.apply (self, [asin, deal]);
            }
        }
        self.log ("Registered DealID " + deal.dealID + " for: ASIN " + asin);
    },
    
    
    registerCartDeal: function (asin, deal) {
        var self = this;
        
        deal.purchaseStatusWarningThreshold =
          self.getWarningThreshold();
        
        
        if (!self.seenInfo[asin] || !self.seenInfo[asin].expired) {
            
            self.dealExpirationConnections[asin] =
              deal.connect ('pstatus_expire',
                            function (deal, asin) {
                                self.handleStateExpiration
                                  (deal, asin,
                                   Deal.stateAlertsEnum.ATC_EXPIRED);
                            });
        }
        
        
        if (!self.seenInfo[asin] || !self.seenInfo[asin].expires_soon) {
            
            self.dealExpiresSoonConnections[asin] =
              deal.connect ('pstatus_expires_soon',
                            function (deal, asin) {
                                self.handleStateExpiration
                                  (deal, asin,
                                   Deal.stateAlertsEnum.ATC_EXPIRES_SOON);
                            });
        }
    },
    
    
    
    disconnectAll: function() {
        var self = this;
        for (var asin in self.dealExpirationConnections) {
            self.dealExpirationConnections[asin].disconnect();
        }
        for (var asin in self.dealExpirationConnections) {
            self.dealExpiresSoonConnections[asin].disconnect();
        }
        self.dealExpirationConnections  = {};
        self.dealExpiresSoonConnections = {};
    },
    
    
    
    
    
    handleStateExpiration: function (deal, asinString, eStateAlert) {
        var dealAsin = Deal.findDealAsin (asinString, deal);
        var self = this;
        if (!self.watchDeals[dealAsin.asin]) {
            self.log ("handleStateExpire (" + dealAsin.asin +
                      "): Not watching ASIN - IGNORING.");
            return;
        } else {
            self.log ("handleStateExpire (" + dealAsin.asin +
                      "): Watching ASIN - CONTINUE.");
        }
        
        
        
        var seenIt = self.getSeenAlertForState (dealAsin.asin, eStateAlert);
        var alreadyDisplayed = self.getDisplayed (dealAsin.asin, eStateAlert);
        if (seenIt == true || alreadyDisplayed == true) {
            self.log ("Already seen alert for (" + dealAsin.asin + ", " + eStateAlert +") - ignoring");
            return;
        } else {
            self.log ("Haven't seen alert, continuing");
        }
        var discountExpirationDate =
          self.cartAsins[dealAsin.asin].discountExpirationDate;
        
        
        
        self.getNotificationInfo (dealAsin.asin, discountExpirationDate,
          
          
          function (result) {
              
              self.registerSeenInfo (dealAsin.asin, result.seen);
              var seenIt =
                self.getSeenAlertForState (dealAsin.asin, eStateAlert);
              
              if (seenIt == false) {
                  
                  self.getStatusAndDisplayAlert (dealAsin.asin, eStateAlert);
              }
              
          },
          
          
          
          function (error) {
              
              self.seenInfo[dealAsin.asin] =
                {expires_soon: false,
                 expired: false
                };
              
              self.displayAlert
                (dealAsin.asin, eStateAlert);
          }
        );
    },
    
    
    
    getStatusAndDisplayAlert: function (asin, eStateAlert) {
        var self = this;
        self.getDealAsinStatus (asin,
           
           function (result) {
               var dealAsinStatuses = result.dealAsinStatuses;
               if (dealAsinStatuses == null || dealAsinStatuses.length == 0) {
                   self.log ("Error, dealAsinStatuses is null or empty. Not displaying alert.");
                   return;
               }
               var dealAsinStatus = null;
               for (var i = 0; i < dealAsinStatuses.length; i++) {
                   var tmpStatus = dealAsinStatuses[i];
                   if (tmpStatus != null && tmpStatus.asin == asin) {
                       dealAsinStatus = tmpStatus;
                       break;
                   }
               }
               if (dealAsinStatus == null) {
                   self.log ("Couldn't find DealAsinStatus for " + asin +
                             "; not displaying alert.");
                   return;
               }
               
               
               
               
               /*
               var comparison;
               switch (eStateAlert) {
                   case Deal.stateAlertsEnum.ATC_EXPIRES_SOON:
                      comparison = 'InCart';
                   break;
                   case Deal.stateAlertsEnum.ATC_EXPIRED:
                      comparison = 'Expired';
                   break;
                   default:
                      self.log ("Invalid stateAlertEnum: " + eStateAlert);
                      return;
               }
               if (comparison == dealAsinStatus.purchaseStatus.state) {
                   
                   self.log ("Purchase State is correct, displaying alert!");
                   self.displayAlert (asin, eStateAlert);
               }
               */
               
               
               self.displayAlert (asin, eStateAlert);
           },
           
           function (error) {
               
               self.log ("Error calling GetDealAsinStatus: " + error);
           }
        );
    },
    
    //
    
    
    
    getSeenAlertForState: function (asin, eStateAlert) {
        var self = this;
        if (!self.seenInfo[asin]) {
            self.log ("no info, returning null");
            return null;
        }
        var stateString = self.stateStrings[eStateAlert];
        if (stateString == null) {
            return false;
        }
        var seenIt = self.seenInfo[asin][stateString];
        if (seenIt == null) {
            return false;
        }
        return seenIt;
    },
    
    
    
    
    
    getDealAsinStatus: function (asin, onSuccess, onFailure) {
        var self = this;
        if (asin == null) {
            self.log ("Asin is null, can't call GetDealAsinStatus.");
            return;
        }
        var asins = [asin];
        self.service.call (
            '/xa/goldbox/GetDealAsinStatus',
            {
                requestMetadata: {marketplaceID: self.getMarketplaceId()},
                customerID: self.getCustomerId(),
                filter: Deal.Service.AsinDealFilter (asins)
            },
            function (result) {
                onSuccess (result);
            },
            function (error) {
                onFailure (error);
            }
        );
    },
    getDealAsinStatuses: function (onSuccess, onFailure) {
        var self = this;
        var dealIds = self._getDealIdsFromWaitlistAsins();
        self.log ("Calling GetDealAsinStatuses: " + dealIds);
        self.service.call (
            '/xa/goldbox/GetDealAsinStatus',
            {
                requestMetadata: {marketplaceID: self.getMarketplaceId()},
                customerID: self.getCustomerId(),
                filter: Deal.Service.DealIDDealFilter(dealIds)
            },
            function (result) {
                onSuccess (result);
            },
            function (error) {
                onFailure (error);
            }
        );
    },
    
    _getDealIdsFromWaitlistAsins: function() {
        var self = this;
        var dealIds = [];
        for (var asin in self.waitlistAsins) {
            if (self.waitlistAsins[asin] && self.waitlistAsins[asin].dealId) {
                dealIds.push (self.waitlistAsins[asin].dealId);
            }
        }
        return dealIds;
    },
    
    
    
    getTimeUntilWarn: function (expirationDate, now) {
        var self = this;
        var timeDiff = expirationDate - now;
        var timeLapse = timeDiff - (self.getWarningThreshold() / 1000);
        if (timeLapse < 0) {
            timeLapse = 0;
        }
        return timeLapse;
    },
    
    hasLightningDeals: function() {
        var self = this;
        var cartAsins = self.getCartAsins();
        for (var cartAsin in cartAsins) {
            if (cartAsin != null) {
                return true;
            }
        }
        return false;
    },
    
    
    
    
    
    getDeals: function (asins, success_f, error_f) {
        var self = this;
        var customerId    = self.getCustomerId();
        var marketplaceId = self.getMarketplaceId();
        var asinDealFilter = Deal.Service.AsinDealFilter (asins);
        self.log ("Calling GetDeals");
        self.service.call(
            '/xa/goldbox/GetDeals',
            {requestMetadata: {
                    marketplaceID: marketplaceId},
             customerID: customerId,
             filter: asinDealFilter,
             ordering: [],
             page: 1,
             resultsPerPage: asins.length,
             includeVariations: true
            },
            function(result) {
                success_f (result);
            },
            function(error) {
                error_f (error);
            }
        );
    },
    
    
    getWarningThreshold: function() {
        var self = this;
        var defaultWarningThreshold = 2 * 60 * 1000;
        var threshold = defaultWarningThreshold;
        
        if (self.warningThresholdOffset != 'C') {
            threshold = parseInt (self.warningThresholdOffset, 10) * 60 * 1000;
        }
        return threshold;
    },
    
    
    getCartAsins: function() {
        var self = this;
        var activeItems = self.lightningDealsData.activeItems;
        var cartAsins = {};
        if (activeItems == null || activeItems == undefined) {
            return cartAsins;
        }
        for (var i = 0; i < activeItems.length; i++) {
            var activeItem = activeItems[i];
            cartAsins[activeItem.ASIN] = activeItem;
            self.asinDates[activeItem.ASIN] = activeItem.discountExpirationDate;
        }
        return cartAsins;
    },
    
    
    addOnHideData: function (asin, stateAlertEnum) {
        var self = this;
        var cartAsin = self.cartAsins[asin];
        if (cartAsin == null || cartAsin.discountExpirationDate == null) {
            self.log
              ("Error adding onHideData: no cart data for ASIN: " + asin);
            return;
        }
        self.onHideData.push (
            {'asin': asin,
             'stateAlertEnum': stateAlertEnum,
             'discountExpirationDate': cartAsin.discountExpirationDate
            }
        );
    },
    
    getCustomerId: function() {
        var self = this;
        return self.lightningDealsData.customerID;
    },
    
    getSessionId: function() {
        var self = this;
        return self.sessionId;
    },
    
    getMarketplaceId: function() {
        var self = this;
        return self.lightningDealsData.marketplaceID;
    },
    
    
    getNoCacheValue: function() {
        var self = this;
        return new Date().getTime();
    },
    
    
    getNotificationInfo: function (asin, discountExpirationDate,
                                   success_func, error_func) {
        var self = this;
        var url =
            '/gp/deal/ajax/getSeen.html'+
            '?customerID='+self.getCustomerId()+
            '&sessionID='+self.getSessionId()+
            '&asin='+asin+
            '&dealExpirationDate='+discountExpirationDate+
            '&nocache='+self.getNoCacheValue();
        var params = {
            success: function(result) {
                success_func (result);
            },
            error: function(error) {
                error_func (error);
            },
            failure: function(xhr) {
                error_func (xhr);
            },
            url: url,
            type: "POST",
            data: JSON.stringify({}),
            dataType: 'json' };
        jQuery.ajax(params);
    },
    
    setNotificationInfo: function (asin, discountExpirationDate, eStateAlert) {
        var self = this;
        var stateString = null;
        if (self.stateStrings[eStateAlert]) {
            stateString = self.stateStrings[eStateAlert];
        } else {
            self.log ("Invalid eStateAlert: '" + eStateAlert + "' - cannot set notification info.");
            return;
        }
        
        
        var stateString = self.stateStrings[eStateAlert];
        self.log ("Setting notification info for: (" + asin + ", " +
                  discountExpirationDate + ", " + eStateAlert + " (" + 
                  stateString + "))");
        var url = 
            '/gp/deal/ajax/setSeen.html'+
            '?customerID='+self.getCustomerId()+
            '&sessionID='+self.getSessionId()+
            '&asin='+asin+
            '&dealExpirationDate='+discountExpirationDate+
            '&state='+stateString+
            '&nocache='+self.getNoCacheValue();
        var params = {
            success: function(result) {
                if (result.success) {
                    self.log ("Successfully setSeen for asin: " +
                              result.request.asin + "; " +
                              result.request.ded);
                } else {
                    self.log ("Error calling setSeen for asin: " +
                              result.request.asin + "; " +
                              result.request.ded);
                }
            },
            error: function(error) {
                self.log ("Error calling setSeen: " + error);
            },
            failure: function(xhr) {
                self.log ("Failure calling setSeen: " + xhr);
            },
            url: url,
            type: "POST",
            data: JSON.stringify({}),
            dataType: 'json' };
        jQuery.ajax(params);
    },
    
    getWaitListedAsins: function (success_func, error_func) {
        var self = this;
        var url =
            '/gp/deal/ajax/getWlInfo.html'+
            '?customerID='+self.getCustomerId()+
            '&sessionID='+self.getSessionId();
        var params = {
            success: function(result) {
                success_func (result);
            },
            error: function(error) {
                error_func (error);
            },
            failure: function(xhr) {
                error_func (xhr);
            },
            url: url,
            type: "POST",
            data: JSON.stringify({}),
            dataType: 'json' };
        jQuery.ajax(params);
    },
    buy: function (asin, error_f) {
        var self = this;
        if (!self.service.customer_id) {
            self.log ("Error: Can't call buy if the customer is unrecognized!");
            return;
        }
        var deal = self.watchDeals[asin];
        if (deal == null) {
            self.log ("Error: Can't call buy, no Deal found for ASIN: " + asin);
            return;
        }
        if (!self.buying[deal.dealID]) {
            self.buying[deal.dealID] = true;
            self.service.redeem_deal (deal.dealID, asin,
              function (result) {
                  if (result.redeemed == 1) {
                      var resultDeal = result.deal;
                      var jsonAsins = resultDeal.asins;
                      var resultDealAsin;
                      for (var i = 0; i < jsonAsins.length; i++) {
                          var tmpAsin = jsonAsins[i];
                          if (tmpAsin.asin == asin) {
                              resultDealAsin = tmpAsin;
                              break;
                          }
                      }
                      if (tmpAsin &&
                        tmpAsin.status.purchaseStatus.state == Deal.inCartStr) {
                          
                          self.handleOnHide (tmpAsin);
                          window.location = '/gp/cart/view.html/'+
                                            'ref=xs_gb_ld_tck_'+deal.dealID;
                      } else {
                          error_f();
                      }
                  }
              },
              function (error) {
                  self.log ("Error caling RedeemDeal: " + error);
                  error_f();
              }
            );
        }
    },
    
    
    calculatePurchaseStateEpoch: function (deal, asinString) {
        var self = this;
        var purchaseStateEpoch = 0;
        var dealAsin = Deal.findDealAsin (asinString, deal);
        if (dealAsin.status && dealAsin.status.purchaseStatus) {
            var msToExpiry = dealAsin.status.purchaseStatus.msToExpiry;
            var now = new Date();
            var expiresEpoch =
              (now.getTime() - now.getMilliseconds())/1000;
            purchaseStateEpoch = (msToExpiry / 1000) + expiresEpoch;
            purchaseStateEpoch = Math.floor (purchaseStateEpoch);
            self.log ("Setting purchaseStateEpoch to: " +
                      purchaseStateEpoch);
        }
        return purchaseStateEpoch;
    },
    registerSeenInfo: function (asin, seenInfo) {
        var self = this;
        self.seenInfo[asin] = {};
        
        for (var st in seenInfo) {
            self.seenInfo[asin][st] = seenInfo[st];
        }
    },
    
    
    setDealAndDateData: function (asin, deal) {
        var self = this;
        self.watchDeals[asin] = deal;
        var dealAsin   = Deal.findDealAsin (asin, deal);
        var pStateType = self.getPurchaseStateType (dealAsin);
        
        
        if (!self.cartAsins[asin] ||
            pStateType == Deal.pStateTypeEnum.WAITLIST) {
            self.log ("Deal was sent from a widget, overriding CartData: " +
                      deal.dealID + "; " + asin);
            var purchaseStateDateEpoch =
              self.calculatePurchaseStateEpoch (deal, asin);
            self.setDateData (asin, deal, purchaseStateDateEpoch);
        }
    },
    
    setDateData: function (asin, deal, purchaseStateDateEpoch) {
        var self = this;
        self.cartAsins[asin] = {
            'ASIN': asin,
            'discountExpirationDate': purchaseStateDateEpoch
        };
        self.asinDates[asin] = purchaseStateDateEpoch;
        var dealAsin = Deal.findDealAsin (asin, deal);
        var pStateType = self.getPurchaseStateType (dealAsin);
        
        if (pStateType == Deal.pStateTypeEnum.WAITLIST) {
            purchaseStateDateEpoch =
              dealAsin.status.purchaseStatus.lastUpdated;
            self.log ("Adding Asin to WaitList watch list: " + asin);
            self.waitlistAsins[asin] =
              {'dealId': deal.dealID,
               'lastUpdated': purchaseStateDateEpoch
              };
        }
    },
    getPurchaseStateType: function (dealAsin) {
        var self = this;
        var pStateType = null;
        if (dealAsin && dealAsin.status && dealAsin.status.purchaseStatus) {
            var pState = dealAsin.status.purchaseStatus.state;
            pStateType = Deal.pStateTypeMap[pState];
        }
        return pStateType;
    },
    
    
    
    
    getRegisterFunction: function (dealAsin) {
        var self = this;
        var purchaseState = dealAsin.status.purchaseStatus.state;
        var stateType = Deal.pStateTypeMap[purchaseState];
        var func = null;
        switch (stateType) {
            case Deal.pStateTypeEnum.CART:
                self.log ("Cart Deal: " + dealAsin.asin);
                func = self.registerCartDeal;
            break;
            case Deal.pStateTypeEnum.WAITLIST:
                self.log ("WaitList Deal: " + dealAsin.asin);
                func = self.registerWaitlistDeal;
            break;
            case Deal.pStateTypeEnum.EITHER:
                self.log ("Cart Deal: " + dealAsin.asin);
                func = self.registerCartDeal;
            break;
            default:
                self.log ("Invalid State for DealAsin" + dealAsin.asin);
        }
        return func;
    },
    
    stopWatchingWaitlistAsin: function (asin) {
        var self = this;
        self.log ("Removing Wait List ASIN from watch list: " + asin);
        delete self.waitlistAsins[asin];
    },
    
    stopWatchingCartAsin: function (asin) {
        var self = this;
        self.log ("Removing Cart ASIN from watch list: " + asin);
        
        if (self.dealExpirationConnections[asin]) {
            self.dealExpirationConnections[asin].disconnect();
            delete self.dealExpirationConnections[asin];
        }
        
        if (self.dealExpiresSoonConnections[asin]) {
            self.dealExpiresSoonConnections[asin].disconnect();
            delete self.dealExpiresSoonConnections[asin];
        }
    },
    getStateString: function (eStateAlert) {
        var self = this;
        return self.stateStrings[eStateAlert];
    },
    log: function (msg) {
        var self = this;
        if (self.debug) {
            Deal.log (msg);
        }
    }
});

amznJQ.declareAvailable('lightningDealNotifier');
