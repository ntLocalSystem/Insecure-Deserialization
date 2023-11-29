import pickle
import os
import copyreg

class Testing:
    def __init__(self, val):
        self.val = val


def reduceTesting(testingObj):
    print("reduceTesting() was called")
    return (Testing, (testingObj.val,))


with open("dispatchTablePickle.pkl", "wb") as f:
    testingObj = Testing("val1")
    customPickler = pickle.Pickler(f)
    customPickler.dispatch_table = copyreg.dispatch_table.copy()
    customPickler.dispatch_table[Testing] = reduceTesting
    customPickler.dump(testingObj)


with open("dispatchTablePickle.pkl", "rb") as f:
    customUnpickler = pickle.Unpickler(f)
    unserializedObj = customUnpickler.load()
    print(f"{unserializedObj.val}")