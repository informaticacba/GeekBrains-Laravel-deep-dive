document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('.delete');

    items.forEach((item) => {
        item.addEventListener('click', (e) => {
            const id = e.target.rel;

            if (confirm(`Подтвердите удаление записи с #ID ${id}`)) {
                let url = location.pathname + "/" + id;
                let method = 'DELETE';
                let headers = {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                };

                send(url, method, headers)
                    .then(() => {
                        location.assign(location.pathname);
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            }
        });
    });
});

async function send(url, method, headers) {
    let response = await fetch(url, {
        method: method,
        headers: headers
    });

    let result = await response.json();

    return result.ok;
}
