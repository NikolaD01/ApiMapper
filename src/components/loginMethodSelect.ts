class LoginSelect
{
    private select : HTMLSelectElement;
    private selectedValue : string;
    private action : string;
    private postId : string;
    private methodContainer : HTMLElement;
    constructor(select: HTMLSelectElement) {
        this.select = select;
        this.selectedValue = this.select.value;
        this.action = "am_login_method_select";
        this.postId = (document.getElementById("post_ID") as HTMLInputElement)?.value || '';
        this.methodContainer = document.getElementById('selected_method') as HTMLElement;
    }

    fetchInput() : void {
        this.selectedValue = this.select.value;

        fetch(`${window.admin_globals.ajax_url}?action=${this.action}`, {
            method: "POST",
            credentials: "same-origin",
            body: new URLSearchParams({
                'login-method' : this.selectedValue,
                'post_ID' : this.postId,
            }),
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                this.appendInput(data.data.view);
            }
        })
        .catch((error) => {
             console.error('Error:', error);
        });
    }
    appendInput(view : any) : void {
        this.methodContainer.innerHTML = "";
        this.methodContainer.innerHTML = view;
    }

    listenForChange(): void {
        this.select.addEventListener('change', () => {
            this.fetchInput();
        });
    }
}

const loginMethodSelect = () => {
    const selectElement = document.getElementById('login_method') as HTMLSelectElement;

    if (selectElement) {
        const loginSelect = new LoginSelect(selectElement);
        loginSelect.listenForChange();
    }
}
export default loginMethodSelect;