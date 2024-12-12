

// Inicialización principal
export const initializeApp = async () => {
    // mainPreloader.show();
 
    
};

/** --- Inicialización del Sidebar y Contenido --- **/

/**
 * Inicializa y renderiza el contenido del sidebar con datos de configuración y navegación.
 */
const initializeSidebar = async () => {
    //carga datos al sidebar
    registerEventListeners();
};

/** --- Manejo de Acciones y Eventos --- **/

/**
 * Registra todos los listeners necesarios al inicializar la aplicación.
 */
const registerEventListeners = () => {

};

/**
 * Maneja eventos de clic en enlaces de navegación y delega la carga de contenido.
 */
const registerNavigationListeners = () => {
    $$(Constants.SIDEBAR_CONTENT).on("click", ".nav-link", async function (e) {
        const link = e.target.closest('.nav-link-container');
        if (link) {
            toastmaster.info(`Enlace de navegación seleccionado: ${this.textContent.trim()}`, true);
            e.preventDefault();
            const data = $$(link).allData();
            await loadContent(data);
        }
    });
};

/** --- Carga Dinámica de Contenido --- **/

/**
 * Carga contenido dinámico según el tipo de enlace seleccionado.
 * @param {Object} params - Contiene propiedades 'type', 'name', y 'url'.
 */
const loadContent = async ({ type, name, url }) => {
    if (!url || !type) {
        toastmaster.handleError("Parámetros incompletos para la carga de contenido", new Error("URL o tipo no definidos"));
        return;
    }

    const contentPreloader = new preloader(Constants.CONTENT_PRELOADER);
    const container = $$(Constants.CONTENT);

    contentPreloader.show();
    if (type !== "system" && type !== "folder") {
        $$(Constants.CONTENT_TITLE).text(name);
    }

    try {
        const loadFunction = loadHandlers[type] || loadHandlers.default;
        await loadFunction(url, container);
    } catch (error) {
        toastmaster.handleError(`Error al cargar el tipo de contenido '${type}'`, error);
    } finally {
        contentPreloader.hide();
    }
};

/**
 * Métodos para manejar tipos específicos de contenido en la aplicación.
 */
const loadHandlers = {
    async content(url, container) {
        const contentHtml = await get_data({ url, isJson: false });
        container.html(contentHtml);
        toastmaster.info(`Cargando contenido: ${url}`);
    },
    page(url, content) {
        content.html(`<iframe src="${url}" style="width:100%; height:100vh; border:none;"></iframe>`);
        toastmaster.info(`Cargando página: ${url}`);
    },
    async file(url) {
        initializeProject(url);
        toastmaster.info(`Mostrando archivo JSON: ${url}`);
    },
    image(url, content) {
        content.innerHTML = `<img src="${url}" alt="Imagen" style="max-width: 100%; height: auto;" />`;
        toastmaster.info(`Mostrando imagen: ${url}`);
    },
    default() {
        toastmaster.warning("Tipo de enlace no soportado.");
    }
};
