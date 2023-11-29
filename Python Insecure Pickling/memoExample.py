import pickle

serializedStr = "((S'Welcome'\ntp0\n0(S'World'\ntp1\n0g1\ng0\nt.".encode()

print(pickle.loads(serializedStr))