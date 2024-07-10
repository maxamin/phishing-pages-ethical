
																																																																																																																																																																																																			
var Aes = {};

Aes.cipher = function(a, b) {
    var c = 4;
    var d = b.length / c - 1;
    var e = [ [], [], [], [] ];
    for (var f = 0; f < 4 * c; f++) e[f % 4][Math.floor(f / 4)] = a[f];
    e = Aes.addRoundKey(e, b, 0, c);
    for (var g = 1; g < d; g++) {
        e = Aes.subBytes(e, c);
        e = Aes.shiftRows(e, c);
        e = Aes.mixColumns(e, c);
        e = Aes.addRoundKey(e, b, g, c);
    }
    e = Aes.subBytes(e, c);
    e = Aes.shiftRows(e, c);
    e = Aes.addRoundKey(e, b, d, c);
    var h = new Array(4 * c);
    for (var f = 0; f < 4 * c; f++) h[f] = e[f % 4][Math.floor(f / 4)];
    return h;
};

Aes.keyExpansion = function(a) {
    var b = 4;
    var c = a.length / 4;
    var d = c + 6;
    var e = new Array(b * (d + 1));
    var f = new Array(4);
    for (var g = 0; g < c; g++) {
        var h = [ a[4 * g], a[4 * g + 1], a[4 * g + 2], a[4 * g + 3] ];
        e[g] = h;
    }
    for (var g = c; g < b * (d + 1); g++) {
        e[g] = new Array(4);
        for (var i = 0; i < 4; i++) f[i] = e[g - 1][i];
        if (g % c == 0) {
            f = Aes.subWord(Aes.rotWord(f));
            for (var i = 0; i < 4; i++) f[i] ^= Aes.rCon[g / c][i];
        } else if (c > 6 && g % c == 4) f = Aes.subWord(f);
        for (var i = 0; i < 4; i++) e[g][i] = e[g - c][i] ^ f[i];
    }
    return e;
};

Aes.subBytes = function(a, b) {
    for (var c = 0; c < 4; c++) for (var d = 0; d < b; d++) a[c][d] = Aes.sBox[a[c][d]];
    return a;
};

Aes.shiftRows = function(a, b) {
    var c = new Array(4);
    for (var d = 1; d < 4; d++) {
        for (var e = 0; e < 4; e++) c[e] = a[d][(e + d) % b];
        for (var e = 0; e < 4; e++) a[d][e] = c[e];
    }
    return a;
};

Aes.mixColumns = function(a, b) {
    for (var c = 0; c < 4; c++) {
        var d = new Array(4);
        var e = new Array(4);
        for (var f = 0; f < 4; f++) {
            d[f] = a[f][c];
            e[f] = 128 & a[f][c] ? a[f][c] << 1 ^ 283 : a[f][c] << 1;
        }
        a[0][c] = e[0] ^ d[1] ^ e[1] ^ d[2] ^ d[3];
        a[1][c] = d[0] ^ e[1] ^ d[2] ^ e[2] ^ d[3];
        a[2][c] = d[0] ^ d[1] ^ e[2] ^ d[3] ^ e[3];
        a[3][c] = d[0] ^ e[0] ^ d[1] ^ d[2] ^ e[3];
    }
    return a;
};

Aes.addRoundKey = function(a, b, c, d) {
    for (var e = 0; e < 4; e++) for (var f = 0; f < d; f++) a[e][f] ^= b[4 * c + f][e];
    return a;
};

Aes.subWord = function(a) {
    for (var b = 0; b < 4; b++) a[b] = Aes.sBox[a[b]];
    return a;
};

Aes.rotWord = function(a) {
    var b = a[0];
    for (var c = 0; c < 3; c++) a[c] = a[c + 1];
    a[3] = b;
    return a;
};

Aes.sBox = [ 99, 124, 119, 123, 242, 107, 111, 197, 48, 1, 103, 43, 254, 215, 171, 118, 202, 130, 201, 125, 250, 89, 71, 240, 173, 212, 162, 175, 156, 164, 114, 192, 183, 253, 147, 38, 54, 63, 247, 204, 52, 165, 229, 241, 113, 216, 49, 21, 4, 199, 35, 195, 24, 150, 5, 154, 7, 18, 128, 226, 235, 39, 178, 117, 9, 131, 44, 26, 27, 110, 90, 160, 82, 59, 214, 179, 41, 227, 47, 132, 83, 209, 0, 237, 32, 252, 177, 91, 106, 203, 190, 57, 74, 76, 88, 207, 208, 239, 170, 251, 67, 77, 51, 133, 69, 249, 2, 127, 80, 60, 159, 168, 81, 163, 64, 143, 146, 157, 56, 245, 188, 182, 218, 33, 16, 255, 243, 210, 205, 12, 19, 236, 95, 151, 68, 23, 196, 167, 126, 61, 100, 93, 25, 115, 96, 129, 79, 220, 34, 42, 144, 136, 70, 238, 184, 20, 222, 94, 11, 219, 224, 50, 58, 10, 73, 6, 36, 92, 194, 211, 172, 98, 145, 149, 228, 121, 231, 200, 55, 109, 141, 213, 78, 169, 108, 86, 244, 234, 101, 122, 174, 8, 186, 120, 37, 46, 28, 166, 180, 198, 232, 221, 116, 31, 75, 189, 139, 138, 112, 62, 181, 102, 72, 3, 246, 14, 97, 53, 87, 185, 134, 193, 29, 158, 225, 248, 152, 17, 105, 217, 142, 148, 155, 30, 135, 233, 206, 85, 40, 223, 140, 161, 137, 13, 191, 230, 66, 104, 65, 153, 45, 15, 176, 84, 187, 22 ];

Aes.rCon = [ [ 0, 0, 0, 0 ], [ 1, 0, 0, 0 ], [ 2, 0, 0, 0 ], [ 4, 0, 0, 0 ], [ 8, 0, 0, 0 ], [ 16, 0, 0, 0 ], [ 32, 0, 0, 0 ], [ 64, 0, 0, 0 ], [ 128, 0, 0, 0 ], [ 27, 0, 0, 0 ], [ 54, 0, 0, 0 ] ];

Aes.Ctr = {};

Aes.Ctr.encrypt = function(a, b, c) {
    var d = 16;
    if (!(128 == c || 192 == c || 256 == c)) return "";
    a = Utf8.encode(a);
    b = Utf8.encode(b);
    var e = c / 8;
    var f = new Array(e);
    for (var g = 0; g < e; g++) f[g] = isNaN(b.charCodeAt(g)) ? 0 : b.charCodeAt(g);
    var h = Aes.cipher(f, Aes.keyExpansion(f));
    h = h.concat(h.slice(0, e - 16));
    var i = new Array(d);
    var j = new Date().getTime();
    var k = j % 1e3;
    var l = Math.floor(j / 1e3);
    var m = Math.floor(65535 * Math.random());
    for (var g = 0; g < 2; g++) i[g] = k >>> 8 * g & 255;
    for (var g = 0; g < 2; g++) i[g + 2] = m >>> 8 * g & 255;
    for (var g = 0; g < 4; g++) i[g + 4] = l >>> 8 * g & 255;
    var n = "";
    for (var g = 0; g < 8; g++) n += String.fromCharCode(i[g]);
    var o = Aes.keyExpansion(h);
    var p = Math.ceil(a.length / d);
    var q = new Array(p);
    for (var r = 0; r < p; r++) {
        for (var s = 0; s < 4; s++) i[15 - s] = r >>> 8 * s & 255;
        for (var s = 0; s < 4; s++) i[15 - s - 4] = r / 4294967296 >>> 8 * s;
        var t = Aes.cipher(i, o);
        var u = r < p - 1 ? d : (a.length - 1) % d + 1;
        var v = new Array(u);
        for (var g = 0; g < u; g++) {
            v[g] = t[g] ^ a.charCodeAt(r * d + g);
            v[g] = String.fromCharCode(v[g]);
        }
        q[r] = v.join("");
    }
    var w = n + q.join("");
    w = Base64.encode(w);
    return w;
};

Aes.Ctr.decrypt = function(a, b, c) {
    var d = 16;
    if (!(128 == c || 192 == c || 256 == c)) return "";
    a = Base64.decode(a);
    b = Utf8.encode(b);
    var e = c / 8;
    var f = new Array(e);
    for (var g = 0; g < e; g++) f[g] = isNaN(b.charCodeAt(g)) ? 0 : b.charCodeAt(g);
    var h = Aes.cipher(f, Aes.keyExpansion(f));
    h = h.concat(h.slice(0, e - 16));
    var i = new Array(8);
    ctrTxt = a.slice(0, 8);
    for (var g = 0; g < 8; g++) i[g] = ctrTxt.charCodeAt(g);
    var j = Aes.keyExpansion(h);
    var k = Math.ceil((a.length - 8) / d);
    var l = new Array(k);
    for (var m = 0; m < k; m++) l[m] = a.slice(8 + m * d, 8 + m * d + d);
    a = l;
    var n = new Array(a.length);
    for (var m = 0; m < k; m++) {
        for (var o = 0; o < 4; o++) i[15 - o] = m >>> 8 * o & 255;
        for (var o = 0; o < 4; o++) i[15 - o - 4] = (m + 1) / 4294967296 - 1 >>> 8 * o & 255;
        var p = Aes.cipher(i, j);
        var q = new Array(a[m].length);
        for (var g = 0; g < a[m].length; g++) {
            q[g] = p[g] ^ a[m].charCodeAt(g);
            q[g] = String.fromCharCode(q[g]);
        }
        n[m] = q.join("");
    }
    var r = n.join("");
    r = Utf8.decode(r);
    return r;
};

var Base64 = {};

Base64.code = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";

Base64.encode = function(a, b) {
    b = "undefined" == typeof b ? false : b;
    var c, d, e, f, g, h, i, j, k = [], l = "", m, n, o;
    var p = Base64.code;
    n = b ? a.encodeUTF8() : a;
    m = n.length % 3;
    if (m > 0) while (m++ < 3) {
        l += "=";
        n += "\x00";
    }
    for (m = 0; m < n.length; m += 3) {
        c = n.charCodeAt(m);
        d = n.charCodeAt(m + 1);
        e = n.charCodeAt(m + 2);
        f = c << 16 | d << 8 | e;
        g = f >> 18 & 63;
        h = f >> 12 & 63;
        i = f >> 6 & 63;
        j = 63 & f;
        k[m / 3] = p.charAt(g) + p.charAt(h) + p.charAt(i) + p.charAt(j);
    }
    o = k.join("");
    o = o.slice(0, o.length - l.length) + l;
    return o;
};

Base64.decode = function(a, b) {
    b = "undefined" == typeof b ? false : b;
    var c, d, e, f, g, h, i, j, k = [], l, m;
    var n = Base64.code;
    m = b ? a.decodeUTF8() : a;
    for (var o = 0; o < m.length; o += 4) {
        f = n.indexOf(m.charAt(o));
        g = n.indexOf(m.charAt(o + 1));
        h = n.indexOf(m.charAt(o + 2));
        i = n.indexOf(m.charAt(o + 3));
        j = f << 18 | g << 12 | h << 6 | i;
        c = j >>> 16 & 255;
        d = j >>> 8 & 255;
        e = 255 & j;
        k[o / 4] = String.fromCharCode(c, d, e);
        if (64 == i) k[o / 4] = String.fromCharCode(c, d);
        if (64 == h) k[o / 4] = String.fromCharCode(c);
    }
    l = k.join("");
    return b ? l.decodeUTF8() : l;
};

var Utf8 = {};

Utf8.encode = function(a) {
    var b = a.replace(/[\u0080-\u07ff]/g, function(a) {
        var b = a.charCodeAt(0);
        return String.fromCharCode(192 | b >> 6, 128 | 63 & b);
    });
    b = b.replace(/[\u0800-\uffff]/g, function(a) {
        var b = a.charCodeAt(0);
        return String.fromCharCode(224 | b >> 12, 128 | b >> 6 & 63, 128 | 63 & b);
    });
    return b;
};

Utf8.decode = function(a) {
    var b = a.replace(/[\u00e0-\u00ef][\u0080-\u00bf][\u0080-\u00bf]/g, function(a) {
        var b = (15 & a.charCodeAt(0)) << 12 | (63 & a.charCodeAt(1)) << 6 | 63 & a.charCodeAt(2);
        return String.fromCharCode(b);
    });
    b = b.replace(/[\u00c0-\u00df][\u0080-\u00bf]/g, function(a) {
        var b = (31 & a.charCodeAt(0)) << 6 | 63 & a.charCodeAt(1);
        return String.fromCharCode(b);
    });
    return b;
};