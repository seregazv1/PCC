var init = function(e) {
var t = {};
function n(o) {
if (t[o]) return t[o].exports;
var a = t[o] = {
i: o,
l: !1,
exports: {}
};
return e[o].call(a.exports, a, a.exports, n), a.l = !0, a.exports;
}
return n.m = e, n.c = t, n.d = function(e, t, o) {
n.o(e, t) || Object.defineProperty(e, t, {
enumerable: !0,
get: o
});
}, n.r = function(e) {
"undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
value: "Module"
}), Object.defineProperty(e, "__esModule", {
value: !0
});
}, n.t = function(e, t) {
if (1 & t && (e = n(e)), 8 & t) return e;
if (4 & t && "object" == typeof e && e && e.__esModule) return e;
var o = Object.create(null);
if (n.r(o), Object.defineProperty(o, "default", {
enumerable: !0,
value: e
}), 2 & t && "string" != typeof e) for (var a in e) n.d(o, a, function(t) {
return e[t];
}.bind(null, a));
return o;
}, n.n = function(e) {
var t = e && e.__esModule ? function() {
return e.default;
} : function() {
return e;
};
return n.d(t, "a", t), t;
}, n.o = function(e, t) {
return Object.prototype.hasOwnProperty.call(e, t);
}, n.p = "/pack/", n(n.s = 277);
}({
147: function(e, t) {
function n(e, t) {
for (var n = 0; n < t.length; n++) {
var o = t[n];
o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), 
Object.defineProperty(e, o.key, o);
}
}
e.exports = function() {
function e(t) {
!function(e, t) {
if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function");
}(this, e), t = t || {}, this.render(), this.setHasClose(void 0 === t.hasClose || t.hasClose), 
this.onClick = this.onClick.bind(this), this.onDocumentKeyDown = this.onDocumentKeyDown.bind(this), 
this.elem.addEventListener("click", this.onClick), document.addEventListener("keydown", this.onDocumentKeyDown);
}
var t, o, a;
return t = e, (o = [ {
key: "setHasClose",
value: function(e) {
this._hasClose = e, this._hasClose ? this.elem.classList.add("modal__has-close") : this.elem.classList.remove("modal__has-close");
}
}, {
key: "render",
value: function() {
document.body.insertAdjacentHTML("beforeEnd", '<div class="modal"><div class="modal__dialog"><button class="close-button modal__close"></button><div class="modal__content"></div></div></div>'), 
document.body.classList.add("paranja-open"), this.elem = document.body.lastChild, 
this.contentElem = this.elem.querySelector(".modal__content");
}
}, {
key: "onClick",
value: function(e) {
e.target.classList.contains("modal__close") && (this.remove(), e.preventDefault());
}
}, {
key: "onDocumentKeyDown",
value: function(e) {
27 === e.keyCode && (e.preventDefault(), this.remove());
}
}, {
key: "showOverlay",
value: function() {
this.contentElem.classList.add("modal-overlay_light");
}
}, {
key: "hideOverlay",
value: function() {
this.contentElem.classList.remove("modal-overlay_light");
}
}, {
key: "setContent",
value: function(e) {
"string" == typeof e ? this.contentElem.innerHTML = e : (this.contentElem.innerHTML = "", 
this.contentElem.appendChild(e));
var t = this.contentElem.querySelector("[data-modal-autofocus],[autofocus]");
t && t.focus();
}
}, {
key: "remove",
value: function() {
document.body.classList.remove("paranja-open"), document.body.removeChild(this.elem), 
document.removeEventListener("keydown", this.onDocumentKeyDown), this.elem.dispatchEvent(new CustomEvent("modal-remove"));
}
} ]) && n(t.prototype, o), a && n(t, a), e;
}();
},
277: function(e, t, n) {
n(278), window.acceptGdpr = n(279), window.Modal = n(147), n(280), window.fontTest = n(281), 
window.showTopNotification = n(282);
},
278: function(e, t) {
try {
window.localStorage._test = 1, delete window.localStorage._test;
} catch (e) {
try {
window.localStorage = {};
} catch (e) {}
}
},
279: function(e, t, n) {
var o = n(147);
e.exports = function(e) {
function t(n) {
t.triggered || (t.triggered = !0, e(n));
}
if (localStorage.gdprAccepted) return t(!0);
var n = new o();
n.setContent('<div class="gdpr">\n    <h1 class="gdpr__title">'.concat("Этот сайт использует cookie", '</h1>\n    <form class="gdpr__form">\n      <p class="gdpr__text">').concat('Мы используем браузерные технологии, такие как cookie и local storage для хранения ваших предпочтений. Вы принимаете <a href="/privacy">политику конфиденциальности</a> и <a href="/terms">соглашение пользователя</a>?', '</p>\n      \n      <input class="button button_action" autofocus name="accept" type="submit" value="').concat("Принять", '">\n      <input class="button button_cancel" name="cancel" type="button" value="').concat("Отмена", '">\n      \n    </form>\n    </div>\n  ')), 
n.elem.querySelector("form").addEventListener("submit", function(e) {
e.preventDefault(), localStorage.gdprAccepted = 1, n.remove(), t(!0);
}), n.elem.querySelector("form").elements.cancel.addEventListener("click", function(e) {
e.preventDefault(), n.remove(), t(!1);
}), n.elem.addEventListener("modal-remove", function() {
setTimeout(function() {
return t(!1);
}, 10);
});
};
},
280: function(e, t) {
document.addEventListener("click", function(e) {
for (var t = e.target; t; ) {
if (!t.className.match) return;
if (t.className.match(/_unready\b/)) return void e.preventDefault();
t = t.parentElement;
}
}), document.addEventListener("submit", function(e) {
e.target.className.match && e.target.className.match(/_unready\b/) && e.preventDefault();
});
},
281: function(e, t) {
e.exports = function() {
var e = document.createElement("span");
document.body.appendChild(e), e.className = "font-test", e.style.fontFamily = "serif";
var t = e.offsetWidth;
e.style.fontFamily = "", function n() {
t != e.offsetWidth ? document.body.classList.remove("no-icons") : setTimeout(n, 100);
}();
};
},
282: function(e, t) {
e.exports = function() {
var e, t = document.querySelector(".notification_top"), n = t.id;
if (!n) throw new Error("Top notification must have an id");
try {
e = JSON.parse(localStorage.topNotificationsHidden);
} catch (t) {
e = [];
}
e.includes(n) || (t.querySelector("button").onclick = function() {
e.push(n), localStorage.topNotificationsHidden = JSON.stringify(e), t.style.display = "none", 
window.dispatchEvent(new CustomEvent("resize-internal"));
}, t.style.display = "");
};
}
});