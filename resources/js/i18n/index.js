import { createI18n } from "vue-i18n";
import en from "./locale/en.json";
import vi from "./locale/vi.json";

export default createI18n({
  locale: import.meta.env.VITE_FALLBACK_LOCALE,
  fallbackLocale: import.meta.env.VITE_DEFAULT_LOCALE,
  legacy: false,
  globalInjection: true, // <--- add this
  messages: { en, vi },
});
