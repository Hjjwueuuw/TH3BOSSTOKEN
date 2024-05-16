from pyrogram import Client
import requests
import pyrogram
import json
import random
import asyncio
pr = False


def dump(data):
    with open('data.json', "w", encoding="utf-8") as f:
        json.dump(data, f)


def load():
    with open('data.json', "r", encoding="utf-8") as f:
        return json.load(f)


async def list_catch(session, ch, user_id, acc, bot, list):
    with open("proxies.txt", "r") as f:
        proxis_list = f.read().split("-")

    try:
        dark = Client("", session_string=session)
        await dark.start()
    except:
        return
    if ch == None:
        return
    data = load()
    if data[user_id][acc]["status"] == "off":
        data[user_id][acc]["status"] = "on"
        data[user_id][acc]["stop"] == "no"
        data[user_id][acc]["ch"] = ch
        if ch == "none":
            data[user_id][acc]["status"] = "off"
            dump(data)
            return
        dump(data)
    else:
        pass

    while True:
        await asyncio.sleep(1)
        data = load()
        if data[user_id][acc]["stop"] == "yes" or data[user_id][acc]["status"] == "off":
            break
        username = random.choice(list)
        if "@" in username:
            username = username.replace("@", "")
        if pr:
            print("With -", username)
        prox = random.choice(proxis_list)
        proxies = {
            "https": prox,
            "http": prox
        }
        try:
            response = requests.get(
                "https://t.me/"+str(username))
        except requests.exceptions.ConnectionError or requests.exceptions.ConnectionError or requests.exceptions.ReadTimeout:
            continue
        if pr:
            print("Dn req")
        if response.text.find('If you have <strong>Telegram</strong>, you can contact <a class="tgme_username_link"') >= 0:
            try:
                if pr:
                    print("Available : ", username)
                if ch != "حساب":
                    await dark.set_chat_username(ch, username)
                else:
                    await dark.set_username(username)
                try:
                    await dark.send_message(
                        "me", f"Catch -> @{username} \nBy -> @Dar4k - @Sedthon ")
                    await bot.send_message(
                        int(user_id),
                        f"Catch ({acc}) alert :\nCatch -> @{username} \nBy -> @Dar4k - @Sedthon "
                    )
                    list.remove(username)
                    data[user_id][acc]["list"] = list
                    dump(data)
                except:
                    pass
            except pyrogram.errors.exceptions.bad_request_400.UsernameInvalid:
                pass
            except pyrogram.errors.exceptions.bad_request_400.UsernameNotOccupied:
                await dark.send_message(
                    "me", f"- Available username -> @{username} \nBy -> @Dar4k - @Sedthon ")
                await bot.send_message(
                    int(user_id),
                    f"- Catch ({acc}) alert :\nAvailable username -> @{username} \nBy -> @Dar4k - @Sedthon "
                )
                list.remove(username)
                data[user_id][acc]["list"] = list
                dump(data)
            except pyrogram.errors.FloodWait as e:
                await dark.send_message(
                    "me", f"Sorry but, You have a ban for ({e.value}) sec .")
                await bot.send_message(
                    user_id, f"Sorry but, You have a ban for ({e.value}) sec .")
                break
            except pyrogram.errors.exceptions.forbidden_403.ChatWriteForbidden:
                try:
                    ch = await dark.create_channel(title="Dark the best")
                    await dark.set_chat_username(ch.id, username)
                except Exception as e:
                    await dark.send_message(
                        "me",
                        f"Error to create channel with username @({ch}), The error : \n {e}"
                    )
                    await bot.send_message(
                        user_id,
                        f"Error to create channel with username @({ch}), The error : \n {e}"
                    )
            except Exception as e:
                if "use by" in str(e):
                    await dark.send_message(
                        "me", f"- Available username -> @{username} \nBy -> @Dar4k - @Sedthon ")
                    await bot.send_message(
                        int(user_id),
                        f"- Catch ({acc}) alert :\nAvailable username -> @{username} \nBy -> @Dar4k - @Sedthon "
                    )
                    list.remove(username)
                    data[user_id][acc]["list"] = list
                    dump(data)
                else:
                    await dark.send_message(
                        "me", f"- Error with -> @{username} , The error : {str(e)} ")
                    await bot.send_message(
                        int(user_id),
                        f"- Catch ({acc}) alert :\nerror with -> @{username} , The error : {str(e)} "
                    )
                    break
        else:
            pass
    try:
        await dark.stop()
    except:
        pass
    data = load()
    data[user_id][acc]["status"] = "off"
    data[user_id][acc]["stop"] = "yes"
    dump(data)
