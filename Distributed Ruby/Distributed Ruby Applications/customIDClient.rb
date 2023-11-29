require 'drb'


serverHelloWorld = DRbObject.new_with_uri("druby://192.168.1.200:6666")
puts serverHelloWorld.inspect

serverHello = serverHelloWorld.returnHello("Rohit Mutalik")
puts serverHello.inspect
