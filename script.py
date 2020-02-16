import os
import sys
string240 = 'ffmpeg -i '+ sys.argv[1]+ ' -vf scale=240:-1 -vcodec mpeg4 -qscale 3 '+sys.argv[1][:-4]+'_240p'+sys.argv[1][-4:]
string480 = 'ffmpeg -i '+ sys.argv[1]+ ' -vf scale=-1:480 -vcodec mpeg4 -qscale 3 '+sys.argv[1][:-4]+'_480p'+sys.argv[1][-4:]
string720 = 'ffmpeg -i '+ sys.argv[1]+ ' -vf scale=-1:720 -vcodec mpeg4 -qscale 3 '+sys.argv[1][:-4]+'_720p'+sys.argv[1][-4:]
os.system(string240)
os.system(string480)
os.system(string720)
