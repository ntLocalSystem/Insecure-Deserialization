# restrictedUnpickler.py

import builtins
import io
import pickle

safe_builtins = {
    'range',
    'complex',
    'set',
    'frozenset',
    'slice',
}

class RestrictedUnpickler(pickle.Unpickler):

    def find_class(self, module, name):
        # Only allow safe classes from builtins.
        if module == "builtins" and name in safe_builtins:
            return getattr(builtins, name)
        # Forbid everything else.
        raise pickle.UnpicklingError("global '%s.%s' is forbidden" %
                                     (module, name))

def restricted_loads(f):
    """Helper function analogous to pickle.loads()."""
    return RestrictedUnpickler(f).load()
    

# Try to open serialized object which will call os.system() to rehydrate
with open("getStatePickle", "rb") as f:
    t2 = restricted_loads(f)