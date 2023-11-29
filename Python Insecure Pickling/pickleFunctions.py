import pickle

def func1():
    print("Welcome world!")


pickleFile = open("pickledFunctions", "wb")
pickle.dump(func1, pickleFile)
