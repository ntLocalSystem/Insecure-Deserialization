# unserializeCreateObjectExecuteMethod.py

import pickle
import builtins

class RohitClass:
    def __init__(self, val):
        self.val = val

    def __call__(self):
        return self.val
    
    def getVal(self):
        return self.val


    

importModuleSerializedString = "c__main__\nRohitClass\n"
argumentTupleSerializedString = "(S'rohitislord'\nt"
createObjectSerializedString = "R"
callObjectCallableArgumentSerializedString = "(t"
executeObjectCallable = "R."

serializedString = (importModuleSerializedString + argumentTupleSerializedString + createObjectSerializedString + callObjectCallableArgumentSerializedString + executeObjectCallable).encode()
print(pickle.loads(serializedString))


