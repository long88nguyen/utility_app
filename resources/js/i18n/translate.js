import i18n from ".";

const Trans = {
    get supportedLocales() {
        return import.meta.env.VITE_SUPPORT_LOCALES.split(',')
    },

    set currentLocale(newLocale)
    {
        i18n.global.locale.value = newLocale;
    }
}

export default Trans;