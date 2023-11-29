import os
import hashlib
import binascii
import sys

# This only works if your
# phar archive uses SHA1 hash

sha1_size = 20
signature_type = 4
signature_magic_bytes = 4
signature_size = sha1_size + signature_type + signature_magic_bytes

if(len(sys.argv) < 3):
    print("Only SHA1 hash phar archive will work.")
    print(f"USAGE: python {sys.argv[0]} PHAR IMAGE")
    exit()

phar_file = sys.argv[1]
image_file = sys.argv[2]

phar_file_size = os.path.getsize(phar_file)

# Read the image as binary
with open(image_file, "rb") as img:
    with open(phar_file, "rb") as phar_f:
        with open(f"stitchedPhar.{image_file.split('.')[-1]}", "wb") as imgphar:
            image_content = img.read(-1)
            phar_content = phar_f.read(phar_file_size - signature_size)
            phar_signature_static = phar_f.read(-1)[20:]
            stitched_content = image_content + phar_content
            hash_object = hashlib.sha1(stitched_content)
            stitched_hash = hash_object.digest()
            imgphar.write(stitched_content + stitched_hash + phar_signature_static)


print(f"Done! File is stitchedPhar.{image_file.split('.')[-1]}")