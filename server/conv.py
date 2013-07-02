import struct
import sys

fin = open('g.DTA','rb');

fout = open('test.txt','w');

toggle = 1;

try:
    b = struct.unpack('>f',fin.read(4));
    while b != "":
        b = struct.unpack('>f',fin.read(4));
        if toggle == 1 :
            print(b[0])
            print(',')
            fout.write(str(b[0]));
            fout.write(',');
            toggle = 2;
        else :
            print(b[0])
            fout.write(str(b[0]));
            fout.write('\n');
            toggle = 1;
            
finally:
fin.close()

print('Number of arguments:', len(sys.argv));
print('Argument List:',str(sys.argv));
