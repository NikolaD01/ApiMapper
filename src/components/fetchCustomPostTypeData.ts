class FetchData
{
    public form!: HTMLFormElement;
    private postType : string;
    private action : string;
    constructor(form : HTMLFormElement) {
        this.form = form;
        this.action = "am_fetch_custom_post_type_data"
        this.postType = (form.querySelector("select[name='cpt-selector']") as HTMLSelectElement).value;
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

                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
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