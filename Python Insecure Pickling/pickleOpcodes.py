import pickle


serializedString = "S'Welcome World!'\n.".encode()
serializedList = "(S'Welcome'\nS'World'\nl.".encode()
serializedTuple = "(S'Welcome'\nS'World'\nt.".encode()
serializedComplexTuple = "(S'Welcome'\n(S'Rohit'\nS' & '\nS'World'\nll.".encode()
serializedDict = "(dS'Welcome'\nS'World'\nsS'key'\nI0\ns.".encode()
serializedDict2 = '(S"1"\nI1\nI2\nS"2"\nd.'.encode()
serializedSystemCall = "cos\nsystem\n(S'echo \'Hello World\'\ntR.".encode()

serializedFunctionImport = "cfuncDef\nechoworld\n(S'Hello World'\ntR.".encode()

print(pickle.loads(serializedString))
print(pickle.loads(serializedList))
print(pickle.loads(serializedTuple))
print(pickle.loads(serializedComplexTuple))
print(pickle.loads(serializedDict))
print(pickle.loads(serializedDict2))
print(pickle.loads(serializedSystemCall))
print(pickle.loads(serializedFunctionImport))