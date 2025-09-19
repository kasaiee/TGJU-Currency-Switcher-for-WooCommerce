# TGJU Currency Switcher for WooCommerce

**English | [فارسی](#فارسی)**

---

## English

### Overview
This WordPress plugin adds a **currency switcher** to WooCommerce that allows customers to view prices in either **Toman (IRT)** or **Euro (EUR)**.  
Exchange rates are intended to be fetched from **TGJU API**, but in this early release (v0.1) a static placeholder rate is used.

### Features
- Front-end **currency switcher** via shortcode:
  ```php
  [tgju_currency_switcher]
  ```
- Dynamically converts **all WooCommerce product prices** when Euro is selected.
- Changes WooCommerce’s **currency code** and **symbol** accordingly.
- Decimal handling:
  - Euro prices show up to 2 decimals (e.g. `4.05 €`).
  - Whole numbers show without decimals (e.g. `4 €`).
  - Toman prices always display without decimals.

### Installation
1. Upload the ZIP file to your WordPress site via **Plugins → Add New → Upload Plugin**.
2. Activate it in the **Plugins** menu.
3. Insert the shortcode `[tgju_currency_switcher]` in your theme (e.g. header, sidebar, or footer).

### Roadmap
- Replace placeholder Euro rate with **live TGJU API fetch**.
- Admin settings page for manual rate fetch and debugging.
- Support for additional currencies.

---

## فارسی

### معرفی
این افزونه یک **سوییچر ارز** به ووکامرس اضافه می‌کند که به مشتری اجازه می‌دهد قیمت‌ها را به صورت **تومان (IRT)** یا **یورو (EUR)** مشاهده کند.  
در این نسخه‌ی اولیه (v0.1) نرخ تبدیل به صورت ثابت تعریف شده و هنوز از API سایت TGJU واکشی نمی‌شود.

### امکانات
- افزودن **شورتکد** برای سوییچر ارز:
  ```php
  [tgju_currency_switcher]
  ```
- تبدیل خودکار **تمام قیمت‌های ووکامرس** هنگام انتخاب یورو.
- تغییر واحد و نماد پول ووکامرس بر اساس انتخاب کاربر.
- مدیریت اعشار:
  - قیمت‌های یورویی با حداکثر ۲ رقم اعشار نمایش داده می‌شوند (مثل `4.05 €`).
  - اگر عدد صحیح باشد، بدون اعشار (مثل `4 €`).
  - تومان همیشه بدون اعشار نمایش داده می‌شود.

### نصب
1. فایل ZIP را در وردپرس از مسیر **افزونه‌ها → افزودن → بارگذاری افزونه** آپلود کنید.  
2. افزونه را در بخش **افزونه‌ها** فعال کنید.  
3. شورتکد `[tgju_currency_switcher]` را در هر جای قالب (مثلاً هدر یا سایدبار) قرار دهید.

### نقشه راه
- جایگزین‌کردن نرخ ثابت با **نرخ زنده از TGJU API**.  
- افزودن صفحه مدیریت برای واکشی دستی نرخ و نمایش دیباگ.  
- پشتیبانی از ارزهای بیشتر.

---

## License
GPLv2 or later
