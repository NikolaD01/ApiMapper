/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/components/addMetafieldInputs.ts":
/*!**********************************************!*\
  !*** ./src/components/addMetafieldInputs.ts ***!
  \**********************************************/
/***/ ((__unused_webpack_module, exports) => {


Object.defineProperty(exports, "__esModule", ({ value: true }));
class AddMetafieldInputs {
    constructor() {
        this.action = "am_add_metafield_inputs";
        this.clickCount = 0;
        this.container = document.getElementById('metafields-inputs');
    }
    fetch() {
        this.clickCount++;
        fetch(`${window.admin_globals.ajax_url}?action=${this.action}`, {
            method: "POST",
            credentials: "same-origin",
            body: new URLSearchParams({
                'count': this.clickCount.toString()
            })
        })
            .then(r => r.json())
            .then(r => {
            this.append(r.data.view);
        })
            .catch(error => console.error('Error:', error));
    }
    append(view) {
        if (this.container) {
            this.container.insertAdjacentHTML('beforeend', view);
        }
    }
}
const addMetafieldInputs = () => {
    const input = document.getElementById('am-add-metafield');
    if (input) {
        const instance = new AddMetafieldInputs();
        input.addEventListener('click', () => instance.fetch());
    }
};
exports["default"] = addMetafieldInputs;


/***/ }),

/***/ "./src/components/fetchApiData.ts":
/*!****************************************!*\
  !*** ./src/components/fetchApiData.ts ***!
  \****************************************/
/***/ ((__unused_webpack_module, exports) => {


Object.defineProperty(exports, "__esModule", ({ value: true }));
class FetchData {
    constructor(form) {
        this.form = form;
        this.action = "am_fetch_api_data";
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
                        <input type="submit" class="api-field" value="${newKey}" />
                        <label>${value}</label>
                    </div>`;
                    container.insertAdjacentHTML('beforeend', fieldHtml);
                }
            });
        }
        else {
            let fieldHtml = `
            <div>
                <input type="submit" class="api-field" value="${parentKey}" />
                <label>${item}</label>
            </div>`;
            container.insertAdjacentHTML('beforeend', fieldHtml);
        }
    }
}
const fetchApiData = () => {
    const form = document.getElementById('am_api_get');
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            new FetchData(form);
        });
    }
};
exports["default"] = fetchApiData;


/***/ }),

/***/ "./src/components/fetchCustomPostTypeData.ts":
/*!***************************************************!*\
  !*** ./src/components/fetchCustomPostTypeData.ts ***!
  \***************************************************/
/***/ ((__unused_webpack_module, exports) => {


Object.defineProperty(exports, "__esModule", ({ value: true }));
class FetchData {
    constructor(form) {
        this.form = form;
        this.action = "am_fetch_custom_post_type_data";
        this.postType = form.querySelector("select[name='cpt-selector']").value;
        this.fetch();
    }
    fetch() {
        fetch(`${window.admin_globals.ajax_url}?action=${this.action}`, {
            method: "POST",
            credentials: "same-origin",
            body: new URLSearchParams({
                'post_type': this.postType,
            }),
        })
            .then(response => response.json())
            .then(data => {
            if (data.success) {
            }
        })
            .catch((error) => {
            console.error('Error:', error);
        });
    }
}
const fetchCustomPostTypeData = () => {
    const form = document.getElementById('am_cpt_get');
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            new FetchData(form);
        });
    }
};
exports["default"] = fetchCustomPostTypeData;


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
        this.action = "am_login_method_select";
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
const fetchApiData_1 = __importDefault(__webpack_require__(/*! ./components/fetchApiData */ "./src/components/fetchApiData.ts"));
const fetchCustomPostTypeData_1 = __importDefault(__webpack_require__(/*! ./components/fetchCustomPostTypeData */ "./src/components/fetchCustomPostTypeData.ts"));
const addMetafieldInputs_1 = __importDefault(__webpack_require__(/*! ./components/addMetafieldInputs */ "./src/components/addMetafieldInputs.ts"));
const init = () => {
    (0, loginMethodSelect_1.default)();
    (0, fetchApiData_1.default)();
    (0, fetchCustomPostTypeData_1.default)();
    (0, addMetafieldInputs_1.default)();
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