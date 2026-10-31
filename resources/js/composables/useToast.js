import {toast} from "vue3-toastify";
import 'vue3-toastify/dist/index.css';

export default function useToast() {
    const _toast = (text, options) => {
        toast(text,
            {
                ...{
                    type: 'success',
                    transition: toast.TRANSITIONS.BOUNCE,
                    position: toast.POSITION.BOTTOM_RIGHT,
                    theme: 'colored',
                    autoClose: 5000,
                }, ...options,
            }
        )
    }

    return {_toast};
}
