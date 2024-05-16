import requests
from configparser import ConfigParser
from threading import Thread
from re import compile
http_proxies, socks4_proxies, socks5_proxies = [], [], []
proxy_errors, token_errors = 0, 0
channel, post, time_out, real_views = '', 0, 2, 0
REGEX = compile(r"(?:^|\D)?((" + r"(?:[1-9]|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5])"
                + r"\." + r"(?:\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5])"
                + r"\." + r"(?:\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5])"
                + r"\." + r"(?:\d|[1-9]\d|1\d{2}|2[0-4]\d|25[0-5])"
                + r"):" + (r"(?:\d|[1-9]\d{1,3}|[1-5]\d{4}|6[0-4]\d{3}"
                           + r"|65[0-4]\d{2}|655[0-2]\d|6553[0-5])")
                + r")(?:\D|$)")
cfg = ConfigParser(interpolation=None)
cfg.read("config.ini", encoding="utf-8")
http, socks4, socks5 = cfg["HTTP"], cfg["SOCKS4"], cfg["SOCKS5"]


def scrap(sources, _proxy_type):
    for source in sources:
        if source:
            try:
                response = requests.get(source, timeout=time_out)
            except Exception as e:
                pass
            if tuple(REGEX.finditer(response.text)):
                for proxy in tuple(REGEX.finditer(response.text)):
                    if _proxy_type == 'http':
                        http_proxies.append(proxy.group(1))
                    elif _proxy_type == 'socks4':
                        socks4_proxies.append(proxy.group(1))
                    elif _proxy_type == 'socks5':
                        socks5_proxies.append(proxy.group(1))


def start_scrap():
    threads = []
    for i in (http_proxies, socks4_proxies, socks5_proxies):
        i.clear()
    for i in ((http.get("Sources").splitlines(), 'http'), (socks4.get("Sources").splitlines(), 'socks4'), (socks5.get("Sources").splitlines(), 'socks5')):
        thread = Thread(target=scrap, args=(i[0], i[1]))
        threads.append(thread)
        thread.start()
    for t in threads:
        t.join()


