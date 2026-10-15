import 'dayjs/locale/uk.js';
import dayjs from "dayjs";
export function useDate() {
    const formatDate = (date, format = 'D MMMM YYYY') => {
        if (!date) return '';
        return dayjs(date).locale('uk').format(format);

    };

    return { formatDate };
}
