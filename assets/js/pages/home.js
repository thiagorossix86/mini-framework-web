$(document).on('render_home', function () {
    HomeModule.init();
});

const HomeModule = {
    init() {
        this.fetchData();
    },

    fetchData() {
        ApiService.request('acoes/listar')
            .done(response => {
                if (response.status === "success") {
                    this.render(response.data);
                }
            });
    },

    render(acoes) {
        const $container = $('#lista-acoes');
        let html = '';

        if (!acoes || acoes.length === 0) {
            $container.html('<p class="center">Nenhum registro encontrado.</p>');
            return;
        }

        acoes.forEach(item => {
            html += this.template(item);
        });

        $container.hide().html(html).fadeIn(400);
    },

    template(item) {
        const corBadge = item.urgente ? 'red' : 'blue';
        return `
            <div class="col s12 m6 l4">
                <div class="card hoverable">
                    <div class="card-content">
                        <span class="card-title grey-text text-darken-4">
                            <i class="material-icons left ${corBadge}-text">assignment</i>
                            ${item.numero_processo}
                        </span>
                        <p><b>Cliente:</b> ${item.cliente}</p>
                    </div>
                </div>
            </div>`;
    }
};