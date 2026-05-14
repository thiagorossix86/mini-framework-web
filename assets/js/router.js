const Router = {
    routes: {
        '#home': 'views/pages/home.html',
        '#login': 'views/pages/login.html'
    },

    init() {
        $(window).on('hashchange', () => this.loadPage());
        this.loadPage();
    },

    loadPage() {
        const hash = window.location.hash || '#home';
        const pagePath = this.routes[hash];

        if (pagePath) {
            const routeName = hash.replace('#', '');

            // 1. Injeta o CSS
            this.injectCSS(routeName);

            // 2. Carrega o HTML
            $('#main-app').load(pagePath, (response, status) => {
                if (status === "success") {
                    // 3. Injeta o JS e, só depois de carregado, dispara o trigger
                    this.injectJS(routeName, () => {
                        $(document).trigger('pageLoaded', [hash]);
                    });
                }
            });
        }
    },

    injectCSS(routeName) {
        const cssId = `css-${routeName}`;
        if (!$(`#${cssId}`).length) {
            $('<link>', {
                id: cssId,
                rel: 'stylesheet',
                href: `assets/css/pages/${routeName}.css`
            }).appendTo('head');
        }
    },

    injectJS(routeName, callback) {
        const jsPath = `assets/js/pages/${routeName}.js`;

        // O jQuery não tem um seletor nativo para saber se o script já foi carregado
        if ($(`#js-${routeName}`).length) {
            if (callback) callback();
            return;
        }

        // $.getScript carrega e executa o JS. 
        // O $.ajaxSetup({cache: true}) garante que o browser não baixe toda vez.
        $.ajaxSetup({ cache: true });
        $.getScript(jsPath)
            .done(() => {
                // Adicionamos o ID manualmente para o próximo check
                $('script[src="' + jsPath + '"]').attr('id', `js-${routeName}`);
                if (callback) callback();
            })
            .fail((jqxhr, settings, exception) => {
                console.error(`Erro ao carregar o script da página ${routeName}:`, exception);
            });
    }
};