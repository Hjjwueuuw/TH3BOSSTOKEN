import random
import requests
from gen import gen_user
pr = False


async def long_time(bot, msg):
    with open("proxies.txt", "r") as f:
        proxis_list = f.read().split("-")
    while True:
        username = gen_user(2)
        #username = "r_q_n"
        prox = random.choice(proxis_list)
        proxies = {
            "https": prox,
            "http": prox
        }
        try:
            response = requests.get(
                "https://t.me/"+str(username), proxies=proxies, timeout=2)
        except:
            continue
        if response.text.find('If you have <strong>Telegram</strong>, you can contact <a class="tgme_username_link"') >= 0:
            pass
        else:

            if pr:
                print("With :", username)

            try:
                user = await bot.get_users(username)

            except:
                continue
            print(user.status, type(user.status))
            if str(user.status) == "UserStatus.LONG_AGO":
                if pr:
                    print("Long time : ", username)
                await bot.send_message(msg.chat.id, f"Long time : @{username} \n @Dar4k - @Sedthon")
                break
