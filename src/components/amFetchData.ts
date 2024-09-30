class FetchData
{
    private postId : string;
    private action : string;
    private container : HTMLElement | null;
    public form!: HTMLFormElement;
    constructor(form : HTMLFormElement) {
        this.form = form;
        this.action = "amfetch_data";
        this.postId = (form.querySelector("select[name='api-selector']") as HTMLSelectElement).value;
        this.container = document.getElementById('data-output');
        this.fetch();

    }


    fetch() : void {
        fetch(`${window.admin_globals.ajax_url}?action=${this.action}`, {
            method: "POST",
            credentials: "same-origin",
            body: new URLSearchParams({
                'post_ID' : this.postId,
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

    displayData(item : any, container : any, parentKey = '') {
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
                        <input type="checkbox" class="api-field" value="${newKey}" />
                        <label>${newKey}: ${value}</label>
                    </div>`;
                    container.insertAdjacentHTML('beforeend', fieldHtml);
                }
            });
        } else {
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
    const form = document.getElementById('am_api_get') as HTMLFormElement;
    console.log(form);
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            new FetchData(form);
        })
    }
}
export default amFetchData;