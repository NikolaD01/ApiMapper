/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/components/amFetchData.ts":
/*!***************************************!*\
  !*** ./src/components/amFetchData.ts ***!
  \***************************************/
/***/ ((__unused_webpack_module, exports) => {


Object.defineProperty(exports, "__esModule", ({ value: true }));
class FetchData {
    constructor(form) {
        this.form = form;
        this.action = "amfetch_data";
        this.postId = form.querySelector("select[name='api-selector']").value;
        this.container = document.getElementById('data-output');
        this.fetch();
    }
    fetch() {
        fetch(`${window.admin_globals.ajax_url}?action=${this.action}`, {
            method: "POST",
            credentials: "same-origin",
            body: new URLSearchParams({
                'post_ID': this.postId,
            }),
        })
            .then(response => response.json())
            .then(data => {
            if (data.success) {
                if (this.container) {
                    this.container.innerHTML = "";
                }
                this.displayData(data.data, this.container);
            }
        })
            .catch((error) => {
            console.error('Error:', error);
        });
    }
    displayData(item, container, parentKey = '') {
        if (Array.isArray(item)) {
            item.forEach((childItem, index) => {
                this.displayData(childItem, container, `${parentKey}[${index}]`);
            });
        }
        else if (typeof item === 'object' && item !== null) {
            Object.keys(item).forEach(key => {
                let value = item[key];
                let newKey = parentKey ? `${parentKey}.${key}` : key;
                if (typeof value === 'object') {
                    this.displayData(value, container, newKey);
                }
                else {
                    let fieldHtml = `
                    <div>
                        <input type="checkbox" class="api-field" value="${newKey}" />
                        <label>${newKey}: ${value}</label>
                    </div>`;
                    container.insertAdjacentHTML('beforeend', fieldHtml);
                }
            });
        }
        else {
            let fieldHtml = `
            <div>
                <input type="checkbox" class="api-field" value="${parentKey}" />
                <label>${parentKey}: ${item}</label>
            </div>`;
            container.insertAdjacentHTML('beforeend', fieldHtml);
        }
    }
}
const amFetchData = () => {
    const form = document.getElementById('am_api_get');
    console.log(form);
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            new FetchData(form);
        });
    }
};
exports["default"] = amFetchData;


/***/ }),

/***/ "./src/components/loginMethodSelect.ts":
/*!*********************************************!*\
  !*** ./src/components/loginMethodSelect.ts ***!
  \*********************************************/
/***/ ((__unused_webpack_module, exports) => {


Object.defineProperty(exports, "__esModule", ({ value: true }));
class LoginSelect {
    constructor(select) {
        var _a;
        this.select = select;
        this.selectedValue = this.select.value;
        this.action = "login_method_select";
        this.postId = ((_a = document.getElementById("post_ID")) === null || _a === void 0 ? void 0 : _a.value) || '';
        this.methodContainer = document.getElementById('selected_method');
    }
    fetchInput() {
        this.selectedValue = this.select.value;
        fetch(`${window.admin_globals.ajax_url}?action=${this.action}`, {
            method: "POST",
            credentials: "same-origin",
            body: new URLSearchParams({
                'login-method': this.selectedValue,
                'post_ID': this.postId,
            }),
        })
            .then(response => response.json())
            .then(data => {
            if (data.success) {
                this.appendInput(data.data.view);
            }
        })
            .catch((error) => {
            console.error('Error:', error);
        });
    }
    appendInput(view) {
        this.methodContainer.innerHTML = "";
        this.methodContainer.innerHTML = view;
    }
    listenForChange() {
        this.select.addEventListener('change', () => {
            this.fetchInput();
        });
    }
}
const loginMethodSelect = () => {
    const selectElement = document.getElementById('login_method');
    if (selectElement) {
        const loginSelect = new LoginSelect(selectElement);
        loginSelect.listenForChange();
    }
};
exports["default"] = loginMethodSelect;


/***/ }),

/***/ "./src/main.ts":
/*!*********************!*\
  !*** ./src/main.ts ***!
  \*********************/
/***/ (function(__unused_webpack_module, exports, __webpack_require__) {


var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", ({ value: true }));
const loginMethodSelect_1 = __importDefault(__webpack_require__(/*! ./components/loginMethodSelect */ "./src/components/loginMethodSelect.ts"));
const amFetchData_1 = __importDefault(__webpack_require__(/*! ./components/amFetchData */ "./src/components/amFetchData.ts"));
const init = () => {
    (0, loginMethodSelect_1.default)();
    (0, amFetchData_1.default)();
};
init();


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
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	var __webpack_exports__ = __webpack_require__("./src/main.ts");
/******/ 	
/******/ })()
;
//# sourceMappingURL=main.js.map