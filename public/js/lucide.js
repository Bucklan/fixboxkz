import { createIcons, icons } from "public/js/lucide";

(function () {
    "use strict";

    // Lucide Icons
    createIcons({
        icons,
        "stroke-width": 1.5,
        nameAttr: "data-lucide",
    });
    window.lucide = {
        createIcons: createIcons,
        icons: icons,
    };
})();
