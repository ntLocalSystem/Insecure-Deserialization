import pickle
import os

# Creating a class and its object
# override the __getstate__() method

class Testing():
    def __init__(self, testVal):
        self.testVal = testVal

    def getVal(self):
        print(self.testVal)

    def __getstate__(self):
        print(f"I'm being pickled ..... byee..")
        return [self.testVal, self.__dict__]
    
    def __setstate__(self, stateVal):
        print(f"I'm aliveeee..")
        self.__dict__.update(stateVal[1])
        self.testVal = stateVal[0]

    

t1 = Testing("Welcome World!")

with open("getStatePickle", "wb") as f:
    pickle.dump(t1, f)


with open("getStatePickle", "rb") as f:
    t2 = pickle.load(f)
    t2.getVal()
