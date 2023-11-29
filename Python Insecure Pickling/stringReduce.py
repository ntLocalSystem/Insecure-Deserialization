import pickle

class TestClass:
    def __init__(self, val):
        self.val = val

    def __reduce__(self):
        return "tc"

    
tc = TestClass("val1")

serializedObject = pickle.dumps(tc)

unserializedObject = pickle.loads(serializedObject)
print(unserializedObject.val)