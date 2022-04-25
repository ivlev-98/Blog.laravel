/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/mini-css-extract-plugin/dist/loader.js??ruleSet[1].rules[2].use[1]!./node_modules/css-loader/dist/cjs.js!./node_modules/postcss-loader/dist/cjs.js!./node_modules/stylus-loader/dist/cjs.js!./src/stylus/all.styl":
/*!****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/mini-css-extract-plugin/dist/loader.js??ruleSet[1].rules[2].use[1]!./node_modules/css-loader/dist/cjs.js!./node_modules/postcss-loader/dist/cjs.js!./node_modules/stylus-loader/dist/cjs.js!./src/stylus/all.styl ***!
  \****************************************************************************************************************************************************************************************************************************************/
/***/ (() => {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack://webpack/./src/stylus/all.styl?./node_modules/mini-css-extract-plugin/dist/loader.js??ruleSet%5B1%5D.rules%5B2%5D.use%5B1%5D!./node_modules/css-loader/dist/cjs.js!./node_modules/postcss-loader/dist/cjs.js!./node_modules/stylus-loader/dist/cjs.js");

/***/ }),

/***/ "./src/stylus/all.styl":
/*!*****************************!*\
  !*** ./src/stylus/all.styl ***!
  \*****************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

eval("\n      var API = __webpack_require__(/*! !../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ \"./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js\");\n      var domAPI = __webpack_require__(/*! !../../node_modules/style-loader/dist/runtime/styleDomAPI.js */ \"./node_modules/style-loader/dist/runtime/styleDomAPI.js\");\n      var insertFn = __webpack_require__(/*! !../../node_modules/style-loader/dist/runtime/insertBySelector.js */ \"./node_modules/style-loader/dist/runtime/insertBySelector.js\");\n      var setAttributes = __webpack_require__(/*! !../../node_modules/style-loader/dist/runtime/setAttributesWithoutAttributes.js */ \"./node_modules/style-loader/dist/runtime/setAttributesWithoutAttributes.js\");\n      var insertStyleElement = __webpack_require__(/*! !../../node_modules/style-loader/dist/runtime/insertStyleElement.js */ \"./node_modules/style-loader/dist/runtime/insertStyleElement.js\");\n      var styleTagTransformFn = __webpack_require__(/*! !../../node_modules/style-loader/dist/runtime/styleTagTransform.js */ \"./node_modules/style-loader/dist/runtime/styleTagTransform.js\");\n      var content = __webpack_require__(/*! !!../../node_modules/mini-css-extract-plugin/dist/loader.js??ruleSet[1].rules[2].use[1]!../../node_modules/css-loader/dist/cjs.js!../../node_modules/postcss-loader/dist/cjs.js!../../node_modules/stylus-loader/dist/cjs.js!./all.styl */ \"./node_modules/mini-css-extract-plugin/dist/loader.js??ruleSet[1].rules[2].use[1]!./node_modules/css-loader/dist/cjs.js!./node_modules/postcss-loader/dist/cjs.js!./node_modules/stylus-loader/dist/cjs.js!./src/stylus/all.styl\");\n      \n      content = content.__esModule ? content.default : content;\n\nvar options = {};\n\noptions.styleTagTransform = styleTagTransformFn;\noptions.setAttributes = setAttributes;\n\n      options.insert = insertFn.bind(null, \"head\");\n    \noptions.domAPI = domAPI;\noptions.insertStyleElement = insertStyleElement;\n\nvar update = API(content, options);\n\n\n\nmodule.exports = content && content.locals || {};\n\n\n//# sourceURL=webpack://webpack/./src/stylus/all.styl?");

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js":
/*!****************************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js ***!
  \****************************************************************************/
/***/ ((module) => {

"use strict";
eval("\n\nvar stylesInDOM = [];\n\nfunction getIndexByIdentifier(identifier) {\n  var result = -1;\n\n  for (var i = 0; i < stylesInDOM.length; i++) {\n    if (stylesInDOM[i].identifier === identifier) {\n      result = i;\n      break;\n    }\n  }\n\n  return result;\n}\n\nfunction modulesToDom(list, options) {\n  var idCountMap = {};\n  var identifiers = [];\n\n  for (var i = 0; i < list.length; i++) {\n    var item = list[i];\n    var id = options.base ? item[0] + options.base : item[0];\n    var count = idCountMap[id] || 0;\n    var identifier = \"\".concat(id, \" \").concat(count);\n    idCountMap[id] = count + 1;\n    var indexByIdentifier = getIndexByIdentifier(identifier);\n    var obj = {\n      css: item[1],\n      media: item[2],\n      sourceMap: item[3],\n      supports: item[4],\n      layer: item[5]\n    };\n\n    if (indexByIdentifier !== -1) {\n      stylesInDOM[indexByIdentifier].references++;\n      stylesInDOM[indexByIdentifier].updater(obj);\n    } else {\n      var updater = addElementStyle(obj, options);\n      options.byIndex = i;\n      stylesInDOM.splice(i, 0, {\n        identifier: identifier,\n        updater: updater,\n        references: 1\n      });\n    }\n\n    identifiers.push(identifier);\n  }\n\n  return identifiers;\n}\n\nfunction addElementStyle(obj, options) {\n  var api = options.domAPI(options);\n  api.update(obj);\n\n  var updater = function updater(newObj) {\n    if (newObj) {\n      if (newObj.css === obj.css && newObj.media === obj.media && newObj.sourceMap === obj.sourceMap && newObj.supports === obj.supports && newObj.layer === obj.layer) {\n        return;\n      }\n\n      api.update(obj = newObj);\n    } else {\n      api.remove();\n    }\n  };\n\n  return updater;\n}\n\nmodule.exports = function (list, options) {\n  options = options || {};\n  list = list || [];\n  var lastIdentifiers = modulesToDom(list, options);\n  return function update(newList) {\n    newList = newList || [];\n\n    for (var i = 0; i < lastIdentifiers.length; i++) {\n      var identifier = lastIdentifiers[i];\n      var index = getIndexByIdentifier(identifier);\n      stylesInDOM[index].references--;\n    }\n\n    var newLastIdentifiers = modulesToDom(newList, options);\n\n    for (var _i = 0; _i < lastIdentifiers.length; _i++) {\n      var _identifier = lastIdentifiers[_i];\n\n      var _index = getIndexByIdentifier(_identifier);\n\n      if (stylesInDOM[_index].references === 0) {\n        stylesInDOM[_index].updater();\n\n        stylesInDOM.splice(_index, 1);\n      }\n    }\n\n    lastIdentifiers = newLastIdentifiers;\n  };\n};\n\n//# sourceURL=webpack://webpack/./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js?");

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/insertBySelector.js":
/*!********************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/insertBySelector.js ***!
  \********************************************************************/
/***/ ((module) => {

"use strict";
eval("\n\nvar memo = {};\n/* istanbul ignore next  */\n\nfunction getTarget(target) {\n  if (typeof memo[target] === \"undefined\") {\n    var styleTarget = document.querySelector(target); // Special case to return head of iframe instead of iframe itself\n\n    if (window.HTMLIFrameElement && styleTarget instanceof window.HTMLIFrameElement) {\n      try {\n        // This will throw an exception if access to iframe is blocked\n        // due to cross-origin restrictions\n        styleTarget = styleTarget.contentDocument.head;\n      } catch (e) {\n        // istanbul ignore next\n        styleTarget = null;\n      }\n    }\n\n    memo[target] = styleTarget;\n  }\n\n  return memo[target];\n}\n/* istanbul ignore next  */\n\n\nfunction insertBySelector(insert, style) {\n  var target = getTarget(insert);\n\n  if (!target) {\n    throw new Error(\"Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.\");\n  }\n\n  target.appendChild(style);\n}\n\nmodule.exports = insertBySelector;\n\n//# sourceURL=webpack://webpack/./node_modules/style-loader/dist/runtime/insertBySelector.js?");

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/insertStyleElement.js":
/*!**********************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/insertStyleElement.js ***!
  \**********************************************************************/
/***/ ((module) => {

"use strict";
eval("\n\n/* istanbul ignore next  */\nfunction insertStyleElement(options) {\n  var element = document.createElement(\"style\");\n  options.setAttributes(element, options.attributes);\n  options.insert(element, options.options);\n  return element;\n}\n\nmodule.exports = insertStyleElement;\n\n//# sourceURL=webpack://webpack/./node_modules/style-loader/dist/runtime/insertStyleElement.js?");

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/setAttributesWithoutAttributes.js":
/*!**********************************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/setAttributesWithoutAttributes.js ***!
  \**********************************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";
eval("\n\n/* istanbul ignore next  */\nfunction setAttributesWithoutAttributes(styleElement) {\n  var nonce =  true ? __webpack_require__.nc : 0;\n\n  if (nonce) {\n    styleElement.setAttribute(\"nonce\", nonce);\n  }\n}\n\nmodule.exports = setAttributesWithoutAttributes;\n\n//# sourceURL=webpack://webpack/./node_modules/style-loader/dist/runtime/setAttributesWithoutAttributes.js?");

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/styleDomAPI.js":
/*!***************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/styleDomAPI.js ***!
  \***************************************************************/
/***/ ((module) => {

"use strict";
eval("\n\n/* istanbul ignore next  */\nfunction apply(styleElement, options, obj) {\n  var css = \"\";\n\n  if (obj.supports) {\n    css += \"@supports (\".concat(obj.supports, \") {\");\n  }\n\n  if (obj.media) {\n    css += \"@media \".concat(obj.media, \" {\");\n  }\n\n  var needLayer = typeof obj.layer !== \"undefined\";\n\n  if (needLayer) {\n    css += \"@layer\".concat(obj.layer.length > 0 ? \" \".concat(obj.layer) : \"\", \" {\");\n  }\n\n  css += obj.css;\n\n  if (needLayer) {\n    css += \"}\";\n  }\n\n  if (obj.media) {\n    css += \"}\";\n  }\n\n  if (obj.supports) {\n    css += \"}\";\n  }\n\n  var sourceMap = obj.sourceMap;\n\n  if (sourceMap && typeof btoa !== \"undefined\") {\n    css += \"\\n/*# sourceMappingURL=data:application/json;base64,\".concat(btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))), \" */\");\n  } // For old IE\n\n  /* istanbul ignore if  */\n\n\n  options.styleTagTransform(css, styleElement, options.options);\n}\n\nfunction removeStyleElement(styleElement) {\n  // istanbul ignore if\n  if (styleElement.parentNode === null) {\n    return false;\n  }\n\n  styleElement.parentNode.removeChild(styleElement);\n}\n/* istanbul ignore next  */\n\n\nfunction domAPI(options) {\n  var styleElement = options.insertStyleElement(options);\n  return {\n    update: function update(obj) {\n      apply(styleElement, options, obj);\n    },\n    remove: function remove() {\n      removeStyleElement(styleElement);\n    }\n  };\n}\n\nmodule.exports = domAPI;\n\n//# sourceURL=webpack://webpack/./node_modules/style-loader/dist/runtime/styleDomAPI.js?");

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/styleTagTransform.js":
/*!*********************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/styleTagTransform.js ***!
  \*********************************************************************/
/***/ ((module) => {

"use strict";
eval("\n\n/* istanbul ignore next  */\nfunction styleTagTransform(css, styleElement) {\n  if (styleElement.styleSheet) {\n    styleElement.styleSheet.cssText = css;\n  } else {\n    while (styleElement.firstChild) {\n      styleElement.removeChild(styleElement.firstChild);\n    }\n\n    styleElement.appendChild(document.createTextNode(css));\n  }\n}\n\nmodule.exports = styleTagTransform;\n\n//# sourceURL=webpack://webpack/./node_modules/style-loader/dist/runtime/styleTagTransform.js?");

/***/ }),

/***/ "./src/index.ts":
/*!**********************!*\
  !*** ./src/index.ts ***!
  \**********************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";
eval("\nObject.defineProperty(exports, \"__esModule\", ({ value: true }));\n__webpack_require__(/*! ./stylus/all.styl */ \"./src/stylus/all.styl\");\nconst navToggler_1 = __webpack_require__(/*! ./ts/navToggler */ \"./src/ts/navToggler.ts\");\nconst imgPreview_1 = __webpack_require__(/*! ./ts/imgPreview */ \"./src/ts/imgPreview.ts\");\nconst alertClose_1 = __webpack_require__(/*! ./ts/alertClose */ \"./src/ts/alertClose.ts\");\nconst headerNav = new navToggler_1.navToggler({\n    'triggers': ['.site-header__controls'],\n    'toggleItems': ['.site-header__nav', '#site-overlay'],\n    'activeClass': 'active'\n});\nheaderNav.watch();\nconst rightNav = new navToggler_1.navToggler({\n    'triggers': ['#menuTrigger'],\n    'toggleItems': ['#site-overlay2', '.container', '.site-header'],\n    'activeClass': 'active'\n});\nrightNav.watch();\nif (document.querySelector(\"#imgLabel > .img\")) {\n    const imgPreview = new imgPreview_1.ImgPreview(\"#img\", \"#imgLabel > .img\");\n    imgPreview.watch(\"#imgLabel > svg\");\n}\nconst alertClose = new alertClose_1.AlertClose('.alert > span');\nif (document.querySelector('.alert')) {\n    alertClose.watch();\n}\n\n\n//# sourceURL=webpack://webpack/./src/index.ts?");

/***/ }),

/***/ "./src/ts/alertClose.ts":
/*!******************************!*\
  !*** ./src/ts/alertClose.ts ***!
  \******************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";
eval("\nObject.defineProperty(exports, \"__esModule\", ({ value: true }));\nexports.AlertClose = void 0;\nclass AlertClose {\n    constructor(trigger) {\n        this.triggers = document.querySelectorAll(trigger);\n    }\n    close(trigger) {\n        trigger.closest('.alert').remove();\n    }\n    watch() {\n        this.triggers.forEach((trigger) => {\n            trigger.addEventListener('click', () => {\n                this.close(trigger);\n                console.log('c');\n            });\n        });\n    }\n}\nexports.AlertClose = AlertClose;\n\n\n//# sourceURL=webpack://webpack/./src/ts/alertClose.ts?");

/***/ }),

/***/ "./src/ts/imgPreview.ts":
/*!******************************!*\
  !*** ./src/ts/imgPreview.ts ***!
  \******************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";
eval("\nObject.defineProperty(exports, \"__esModule\", ({ value: true }));\nexports.ImgPreview = void 0;\nclass ImgPreview {\n    constructor(input, container) {\n        this.input = document.querySelector(input);\n        this.container = document.querySelector(container);\n    }\n    watch(closeTrigger) {\n        this.input.addEventListener(\"change\", () => {\n            this.loadPreview();\n        });\n        document.querySelector(closeTrigger).addEventListener(\"click\", event => {\n            event.preventDefault();\n            this.closeImage();\n        });\n    }\n    loadPreview() {\n        let reader = new FileReader();\n        let img = this.input.files[0];\n        if (img) {\n            if (/\\.(jpe?g|png|gif|webp)$/i.test(img.name)) {\n                reader.readAsDataURL(img);\n            }\n        }\n        reader.addEventListener(\"load\", () => {\n            this.container.innerHTML = '';\n            this.container.appendChild(this.createImage(reader.result));\n        });\n    }\n    createImage(data) {\n        let img = document.createElement(\"img\");\n        img.setAttribute(\"alt\", \"preview\");\n        img.setAttribute(\"loading\", \"lazy\");\n        img.setAttribute(\"src\", \"data:\" + data);\n        return img;\n    }\n    closeImage() {\n        this.container.innerHTML = '';\n        this.input.value = null;\n    }\n}\nexports.ImgPreview = ImgPreview;\n\n\n//# sourceURL=webpack://webpack/./src/ts/imgPreview.ts?");

/***/ }),

/***/ "./src/ts/navToggler.ts":
/*!******************************!*\
  !*** ./src/ts/navToggler.ts ***!
  \******************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";
eval("\nObject.defineProperty(exports, \"__esModule\", ({ value: true }));\nexports.navToggler = void 0;\nclass navToggler {\n    constructor(options) {\n        this.triggers = [];\n        this.toggleItems = [];\n        this.activeClass = '';\n        options.triggers.forEach(item => this.triggers.push(document.querySelector(item)));\n        options.toggleItems.forEach(item => this.toggleItems.push(document.querySelector(item)));\n        this.activeClass = options.activeClass;\n    }\n    watch() {\n        this.triggers.forEach(trigger => trigger.addEventListener('click', () => {\n            this.toggleItems.forEach(item => item.classList.toggle(this.activeClass));\n        }));\n    }\n}\nexports.navToggler = navToggler;\n\n\n//# sourceURL=webpack://webpack/./src/ts/navToggler.ts?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./src/index.ts");
/******/ 	
/******/ })()
;