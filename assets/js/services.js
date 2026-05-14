const ApiService = {
    baseUrl: '/api/',

    request(endpoint, method = 'GET', data = null) {
        return $.ajax({
            url: this.baseUrl + endpoint,
            method: method,
            data: data ? JSON.stringify(data) : null,
            contentType: 'application/json; charset=utf-8',
            dataType: 'json'
        }).fail((xhr) => {
            console.error(`Erro na requisição [${endpoint}]:`, xhr.responseText);
            M.toast({ html: 'Erro ao conectar com o servidor', classes: 'red' });
        });
    }
};