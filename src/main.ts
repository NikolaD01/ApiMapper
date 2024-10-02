import loginMethodSelect from "./components/loginMethodSelect";
import amFetchData from "./components/amFetchData";

declare global {
    interface Window {
        admin_globals: {
            ajax_url: string;
            home_url: string;
        };

    }
}


const init = () => {
    loginMethodSelect();
    amFetchData();
};

init();

