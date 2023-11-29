import pickle

def func1():
    print("You have been pwned")


pickleFile = open("pickledFunctions", "rb")
pickle.load(pickleFile)()

