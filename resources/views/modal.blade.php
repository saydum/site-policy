<div id="cookieBanner"
     data-nosnippet
     style="
     position:fixed;
     bottom:20px;
     left:50%;
     transform:translateX(-50%);
     z-index:9999;
     max-width:800px;
     padding:15px;
     background:{{ config('sitepolicy.banner_bg') }};
     color:{{ config('sitepolicy.text_color') }};
     border-top:3px solid {{ config('sitepolicy.border_color') }};
     border-radius:8px;
     display:none;
     align-items:center;
     box-shadow: 0 4px 12px rgba(0,0,0,0.15);
     font-family: sans-serif;"
>
    <div style="flex:1; margin-right:10px; font-size:14px;">
        {{ config('sitepolicy.text') }}
        <a href="{{ config('sitepolicy.link') }}" target="_blank"
           style="color:{{ config('sitepolicy.text_color') }}; text-decoration:underline;">{{ config('sitepolicy.link_text') }}</a>.
    </div>
    <button
        id="acceptCookies"
        style="background:{{ config('sitepolicy.button_bg') }};
        color:#fff;
        border:none;
        padding:8px 15px;
        border-radius:5px;
        cursor:pointer;
        font-weight:bold;"
    >
            {{ config('sitepolicy.button_text') }}
    </button>
</div>

<script>
    (function () {
        const cookieName = "{{ config('sitepolicy.cookie_name') }}";
        const daysLifetime = parseInt("{{ config('sitepolicy.cookie_lifetime_days') }}") || 365;

        function getCookie(name) {
            let matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
            ));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        }

        function setCookie(name, value, days) {
            let date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            let expires = "; expires=" + date.toUTCString();
            document.cookie = name + "=" + (value || "") + expires + "; path=/; SameSite=Lax";
        }

        document.addEventListener('DOMContentLoaded', function () {
            if (!getCookie(cookieName)) {
                const banner = document.getElementById('cookieBanner');
                const btn = document.getElementById('acceptCookies');

                banner.style.display = 'flex';

                btn.addEventListener('click', function () {
                    setCookie(cookieName, '1', daysLifetime);
                    banner.style.transition = "opacity 0.4s ease";
                    banner.style.opacity = 0;
                    setTimeout(() => banner.remove(), 400);
                });
            }
        });
    })();
</script>
