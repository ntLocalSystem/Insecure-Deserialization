import pickle
import builtins

class RohitClass:
    def __init__(self, val):
        self.val = val

    def __call__(self):
        return self.val
    
    def getVal(self):
        return self.val + " Welcome"


    

builtinSerializedgetattr = "c__builtin__\ngetattr\n"
getAttrArgumentTuple = "("
importModuleSerializedString = "c__main__\nRohitClass\n"
argumentTupleSerializedString = "(S'rohitislord'\nt"
getObjectCall = "R"
getAttrArgumentgetVal = "S'getVal'\nt"
executeGetAttr = "R"
callMethod = "(tR."

serializedInstructions = (builtinSerializedgetattr + getAttrArgumentTuple + importModuleSerializedString + argumentTupleSerializedString + getObjectCall + getAttrArgumentgetVal + executeGetAttr + callMethod).encode()

print(pickle.loads(serializedInstructions))