import random


def gen_user(choice):
    c = choice
    abc = "qwertyuiopasdfghjklzxcvbnm1234567890"
    abcc = "qwertyuiopasdfghjklzxcvbnm"
    # ثلاثي
    if c == 1:
        l1 = random.choice(abcc)
        l2 = random.choice(abc)
        l3 = random.choice(abc)
        username = f"{l1}_{l2}_{l3}"
        #username = l1+l2+l2+l2+l3
        username = "".join(username)
        #username = "abdjuxiskdjd"
        return username
    # ثلاثي مكرر
    elif c == 2:
        l1 = random.choice(abcc)
        l2 = random.choice(abc)
        l3 = random.choice(abc)
        username = f"{l1}_{l2}_{l2}"
        username = "".join(username)
        return username
    # سداسي
    elif c == 3:
        l1 = random.choice(abcc)
        l2 = random.choice(abc)
        l3 = random.choice(abc)
        username = [l1, l1, l1, l1, l2, l1]
        random.shuffle(username)
        username = "".join(username)
        return username
    # خماسي
    elif c == 4:
        l1 = random.choice(abcc)
        l2 = random.choice(abc)
        l3 = random.choice(abc)
        username = [l1, l1, l1, l1, l2]
        random.shuffle(username)
        username = "".join(username)
        return username
    # يوزر بوت
    elif c == 5:
        l1 = random.choice(abcc)
        l2 = random.choice(abc)
        l3 = random.choice(abc)
        username = l1+l2+l3+"bot"
        username = "".join(username)
        return username
    else:
        l1 = random.choice(abcc)
        l2 = random.choice(abc)
        l3 = random.choice(abc)
        username = f"{l1}_{l2}_{l3}"
        username = "".join(username)
        return username
