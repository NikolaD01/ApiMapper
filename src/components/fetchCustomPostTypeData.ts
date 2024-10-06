class FetchData
{
    public form!: HTMLFormElement;
    private postType : string;
    private container : HTMLElement | null;
    private action : string;
    constructor(form : HTMLFormElement) {
        this.form = form;
        this.action = "am_fetch_custom_post_type_data"
        this.postType = (form.querySelector("select[name='cpt-selector']") as HTMLSelectElement).value;
        this.container = document.getElementById('cpt-data-output');
        this.fetch();
    }

    fetch() : void {
        fetch(`${window.admin_globals.ajax_url}?action=${this.action}`, {
            method: "POST",
            credentials: "same-origin",
            body: new URLSearchParams({
                'post_type' : this.postType,
            }),
        })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    if(this.container) {
                        this.container.innerHTML = "";
                    }
                    this.displayData(data.data, this.container);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }
    displayData(item: any, container: any, parentKey = '') {
        if (Array.isArray(item)) {
            item.forEach((childItem, index) => {
                this.displayData(childItem, container, `${parentKey}[${index}]`);
            });
        } else if (typeof item === 'object' && item !== null) {
            Object.keys(item).forEach(key => {
                let value = item[key];
                let newKey = parentKey ? `${parentKey}.${key}` : key;

                if (typeof value === 'object') {
                    this.displayData(value, container, newKey);
                } else {
                    let fieldHtml = `
                <div>
                    <input type="submit" class="cpt-field" value="${value}" />
                </div>`;
                    container.insertAdjacentHTML('beforeend', fieldHtml);
                }
            });
        } else {
            let fieldHtml = `
        <div>
            <input type="submit" class="cpt-field" value="${item}" />
        </div>`;
            container.insertAdjacentHTML('beforeend', fieldHtml);
        }
    }
}

const fetchCustomPostTypeData = () => {
    const form = document.getElementById('am_cpt_get') as HTMLFormElement;
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            new FetchData(form);
        })
    }
}
export default fetchCustomPostTypeData;