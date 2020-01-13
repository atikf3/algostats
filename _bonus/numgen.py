import sys, getopt, subprocess, random

name = 'numgen'

def numgen(number, file):
  dat = '"'
  print ("NG: Generating " + str(number) + " random numbers..")
  for x in range(number):
    dat = dat + str(random.randint(1,10000)) + ";"
  dat = dat[:-1] + '"'
  print ("NG: Computing using file \"" + file + "\" ..")
  result = subprocess.run(['php', file, dat], stdout=subprocess.PIPE)
  result.stdout.decode('utf-8')
  print (result.stdout.decode('utf-8'))

def main(argv):
  number = ''
  file = ''
  try:
    opts, args = getopt.getopt(argv,"hn:f:",["number=","file="])
  except getopt.GetoptError:
    print (name + '.py -n <number> -f <file>')
    sys.exit(2)
  for opt, arg in opts:
    if opt == '-h':
        print (name + '.py -n <number> -f <file>')
        sys.exit()
    elif opt in ("-n", "--number"):
        number = arg
    elif opt in ("-f", "--file"):
        file = arg
  if not file or not number:
    print (name + '.py -n <number> -f <file>')
    sys.exit(2) 
  numgen(int(number), file)

if __name__ == "__main__":
   main(sys.argv[1:])