class AddMetafieldInputs {
    private action : string = "am_add_metafield_inputs";
    private clickCount : number = 0;
    private container : HTMLElement | null = document.getElementById('metafields-inputs');
    fetch() : void {
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
                    this.append(r.data.view)
            })
            .catch(error => console.error('Error:', error));
    }
    append(view : string) : void {
        if(this.container) {
            this.container.insertAdjacentHTML('beforeend', view);
        }
    }
}


const addMetafieldInputs = () => {
    const input : HTMLElement | null = document.getElementById('am-add-metafield');
    if (input) {
        const instance = new AddMetafieldInputs();
        input.addEventListener('click', () => instance.fetch());
    }
}

export default addMetafieldInputs;