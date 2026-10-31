export function useRowNumber() {
    const getRowNumber = (paginator, index) => {
        if (!paginator?.current_page || !paginator?.per_page) {
            return index + 1;
        }

        return (paginator.current_page - 1) * paginator.per_page + index + 1;
    };

    return { getRowNumber };
}
