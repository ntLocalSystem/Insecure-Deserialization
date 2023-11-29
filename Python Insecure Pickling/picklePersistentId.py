# Persistent ID
# allows references of an object
# to be rehydrated from the current
# variables.


import pickle

class persistentPickler(pickle.Pickler):
    def persistent_id(self, obj):
        print(f"persistent_id() was called for {obj}")
        if(isinstance(obj, tuple)):
            # No tuples will be saved.
            return "was a tuple, not serialized"
        else:
            return None

    
class persistentUnpickler(pickle.Unpickler):
    def persistent_load(self, pid):
        if(pid == "was a tuple, not serialized"):
            # All tuples will be replaced by 3
            return (3,)
        else:
            raise pickle.UnpicklingError("It was not an tuple.")



class RohitClass:
    def __init__(self, int1, int2, string1):
        self.int1 = int1
        self.int2 = int2
        self.string1 = string1

with open("persistentPickle.pkl", "wb") as f:
    p1 = persistentPickler(f)
    rohitObject = RohitClass(9, (9, 10), "Rohit is a lord.")
    p1.dump(rohitObject)
    print("Object serialized")


with open("persistentPickle.pkl", "rb") as f:
    p2 = persistentUnpickler(f)
    unserializedRohitObject = p2.load()


# Comparing the two object
print("\n\n")
for key in rohitObject.__dict__.keys():
    print(f"Object that was serialized {rohitObject.__dict__[key]}")

print("\n\n")
for key in rohitObject.__dict__.keys():
    print(f"Object that was unserialized {unserializedRohitObject.__dict__[key]}")
