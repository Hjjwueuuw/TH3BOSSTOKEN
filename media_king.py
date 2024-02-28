from pyrogram import Client,filters
from pyrogram.types import ReplyKeyboardMarkup
from pyrogram.types import InlineKeyboardMarkup
from pyrogram.types import InlineKeyboardButton
import pyromod
from pyromod import listen
import redis,os,sys
import threading
import asyncio

app=Client(
    "King",
    api_id = 17765175,
    api_hash = "e77878aa96e80375b1272e60f746bbf2",
    bot_token = '6128244580:AAGlyFtgx41Ht1L2efT0C0i86CgGkSfxDZw')

redis_url = "redis://default:a2jZotelmeOefoNWvtuaLeq0tLTdMrHf@redis-15873.c250.eu-central-1-1.ec2.cloud.redislabs.com:15873"
r = redis.from_url(redis_url, encoding="utf-8",decode_responses=True)

id = 17765175
hash = "e77878aa96e80375b1272e60f746bbf2"
click = 0

@app.on_message(filters.command("start"))
async def start(app, msg):
    if msg.from_user.id == 5459580600:
        await msg.reply_text(text=f'''Hi ,  {msg.from_user.first_name}''', reply_markup=ReplyKeyboardMarkup(
          [
          [f"ɪɴғᴏ"],
          ["𝚁𝚄𝙽 𝚄𝙿 𖡹","𝚂𝚃𝙾𝙿 𖢪"],
          ["ᴘɪɴ ɪᴅ 𖡟","ᴀᴅᴅ ѕʟᴇᴇᴘ 𖣩"],
          ["ᴀᴅᴅ ᴀᴄᴄᴏᴜɴᴛ","ᴅᴇʟᴇᴛᴇ ᴀᴄᴄᴏᴜɴᴛ","ᴅᴇʟᴇᴛᴇ ᴀʟʟ ᴀᴄᴄᴏᴜɴᴛs"]
          ]
))
    else:
        await app.send_message(msg.chat.id, f'''Hi''', reply_to_message_id=msg.id, reply_markup=InlineKeyboardMarkup(
                inline_keyboard = [[InlineKeyboardButton(text = "Iraqi", url = "https://t.me/wwtwt")]]))

@app.on_message(filters.text)
async def main(app, msg):
        if msg.from_user.id == 5459580600:
        	pass
        else:
        	await app.send_message(msg.chat.id, f'''Dev''', reply_to_message_id=msg.id, reply_markup=InlineKeyboardMarkup(
                inline_keyboard = [[InlineKeyboardButton(text = "Iraqi", url = "https://t.me/wwtwt")]]))
        	return
        if msg.text == 'ᴀᴅᴅ ѕʟᴇᴇᴘ 𖣩':
        	try:
        		os.remove("sleep.txt")
        	except:
        		pass
        	uss = await app.ask(msg.chat.id, f"sᴇɴᴅ sʟᴇᴇᵽ ᴛᴏ ᴀᴅᴅ :")
        	asleep = uss.text
        	with open('sleep.txt', 'a') as the_combo:
        		the_combo.write(str(asleep))
        		await msg.reply_text(f"ᴅᴏɴᴇ ᴀᴅᴅ sʟᴇᴇ𝙿 » {asleep}")
        if msg.text == 'ɪɴғᴏ':
        		 try:
        		 	ii = ('sleep.txt')
        		 	sle = open(ii,'r').read()
        		 	i = ('user.txt')
        		 	us = open(i,'r').read()
        		 except:
        		 	ii = ('sleep.txt')
        		 	i = ('user.txt')
        		 	usi = open(i,'a')
        		 	sle = open(ii,'a')

        		 try:
        		 	sle = open(ii,'r').read()
        		 	us = open(i,'r').read()
        		 	anum = r.smembers("sessions")
        		 	await msg.reply_text(text=f"ᴜsᴇʀ @{us}\n\n𝘚𝘓𝘌𝘌𝘗 𖣫   {sle}\n\n ᴀᴄᴄᴏᴜɴᴛs  {len(anum)}")
        		 except:
        		 	await msg.reply_text(text=f"ᴜsᴇʀ  @None\n\n𝘚𝘓𝘌𝘌𝘗 𖣫   {sle}\n\n")

        if msg.text == "ᴘɪɴ ɪᴅ 𖡟":
        	try:
        		os.remove("user.txt")
        	except:
        		pass
        	uss = await app.ask(msg.chat.id, f"sᴇɴᴅ ᴜsᴇʀɴᴀᴍᴇ ᴛᴏ ᴀᴅᴅ :")
        	acc = uss.text
        	with open('user.txt', 'a') as the_combo:
        		the_combo.write(str(acc))
        	await msg.reply_text(f"ᴅᴏɴᴇ ᴀᴅᴅ ᴜsᴇʀɴᴀᴍᴇ")
        if msg.text == 'ᴅᴇʟᴇᴛᴇ ᴀʟʟ ᴀᴄᴄᴏᴜɴᴛs':
        	await msg.reply_text("اذا كنت متاكد من حذف جميع الحسابات ارسل :\n  /delete_all")
        if msg.text == '/delete_all':
        		r.delete('sessions','ACC')
        		await msg.reply_text("ᴅᴏɴᴇ ᴅᴇʟᴇᴛᴇ ᴀʟʟ ᴀᴄᴄᴏᴜɴᴛ`s")
        if msg.text == "ᴀᴅᴅ ᴀᴄᴄᴏᴜɴᴛ":
        		uss = await app.ask(msg.chat.id, f"sᴇɴᴅ sᴇssɪᴏɴ ᴛᴏ ᴀᴅᴅ ᴀᴄᴄᴏᴜɴᴛ :")
        		session = uss.text
        		count = sum(c.isalnum() for c in session)
        		if count <= 50:
        		  await msg.reply_text("ᴛʜɪs ɪs ɴᴏᴛ Ꭾʏʀᴏɢʀᴀᴍ ᴄᴏᴅᴇ")
        		  return
        		am = r.smembers("sessions")
        		if str(session) in str(am):
        			await msg.reply_text("ᴛʜɪs sᴇssɪᴏɴ ᴀᴄᴄᴏᴜɴᴛ ᴀʟʀᴇᴀᴅʏ ᴇxɪsᴛᴇᴅ")
        		else:
        			r.sadd("sessions", f'{session}')
        			await msg.reply_text(f"ᴅᴏɴᴇ ᴀᴅᴅ sᴇssɪᴏɴ ᴀᴄᴄᴏᴜɴᴛ ")
        if msg.text=='𝚂𝚃𝙾𝙿 𖢪':
        		await msg.reply_text(" ᴅᴏɴᴇ sᴛᴏρ  ʙᴏᴛ")
        		try:
        			os.remove('mode.txt')
        		except:
        			pass
        		x = open('mode.txt','a')
        		x.write('RUN')
        if msg.text == '𝚁𝚄𝙽 𝚄𝙿 𖡹':
        		try:
        			os.remove('mode.txt')
        		except:
        			pass
        		await msg.reply_text("sᴛᴀʀᴛᴇᴅ")
        		wyo = r.smembers("sessions")
        		clicks = 0
        		id = 17765175
        		hash = "e77878aa96e80375b1272e60f746bbf2"
        		for ses in wyo:
        			clicks +=1
        			try:
        				isl = open("sleep.txt",'r').read()
        			except:
        				iso = open('sleep.txt','a')
        				iso.write('0')
        				isl = open("sleep.txt",'r').read()
        			try:
        				tele = Client("name_session",session_string=ses,api_id=id, api_hash=hash)
        				try:
        					check = open('mode.txt','r').read()
        					if 'RUN' in str(check):
        						break
        					else:
        						pass
        				except:
        					pass
        				await tele.start()
        				await asyncio.sleep(float(isl))
        				wa = open('user.txt','r').read()
        				await tele.set_username(wa)
        				await tele.update_profile(first_name="old Modren")
        				me = await tele.get_me()
        				pho = me.phone_number
        				phone = pho[:-2] + "*****"
        				await app.send_video(msg.chat.id,"https://telegra.ph/file/d949ba379c6d8f737dab1.mp4",caption=f"""
UserName: @{wa}

Clicks: {clicks}

Type: Account""")
        				break
        				return
        			except Exception as e:
        			 error = f"{e}".replace("Telegram says: ","").replace(""" is required (caused by "account.UpdateUsername")"""," ").replace('420','').replace("""- The username is already in use by someone else (caused by "account.UpdateUsername")""" ,"").replace("_WAIT_X","").replace("seconds","s").replace("400",'')
        			 await msg.reply_text(f'''⌯ ᴄʜᴇᴄᴋᴇʀ  ❲ {clicks} ❳\n⌯ ᴇʀʀᴏʀ ᴡɪᴛʜ ↣ @{wa}\n⌯ ᴛʜᴇ ᴇʀʀᴏʀ : \n\n{error}''')
        			 if "401 USER_DEACTIVATED_BAN" in str(e) or "401 USER_DEACTIVATED" in str(e):
        			 	r.srem(f"sessions", ses)
        			 	await app.send_message(msg.chat.id, f"sᴇssɪᴏɴ ʙᴀɴ ᴏʀ ɴᴏᴛ ғᴜɴᴅ , ᴅᴏɴᴇ ᴅᴇʟᴇᴛᴇ `")
        			 	pass
        			 	
        if msg.text == 'ᴅᴇʟᴇᴛᴇ ᴀᴄᴄᴏᴜɴᴛ':
        	uss = await app.ask(msg.chat.id, f"sᴇɴᴅ sᴇssɪᴏɴ ᴀᴄᴄᴏᴜɴᴛ ᴛᴏ ᴅᴇʟᴇᴛᴇ :")
        	session = uss.text
        	amm = r.smembers("sessions")
        	if str(session) in str(amm):
        		r.srem("sessions",session)
        		await msg.reply_text("ᴅᴏɴᴇ ᴅᴇʟᴇᴛᴇ sᴇssɪᴏɴ")
        	else:
        		await msg.reply_text("sᴇssɪᴏɴ ᴀᴄᴄᴏᴜɴᴛ ɪs ɴᴏᴛ ᴀʟʀᴇᴀᴅʏ ᴇxɪsᴛᴇᴅ")
		
os.system('clear')
print('~'*50)



app.run()