class FetchData
{
    public form!: HTMLFormElement;

    constructor(form : HTMLFormElement) {
        this.form = form;
    }
    }

const fetchCustomPostTypeData = () => {
    const form = document.getElementById('am_api_get') as HTMLFormElement;
    console.log(form);
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            new FetchData(form);
        })
    }
}
export default fetchCustomPostTypeData;