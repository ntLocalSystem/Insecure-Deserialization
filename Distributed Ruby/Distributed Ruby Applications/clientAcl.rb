require 'drb'

server = DRbObject.new_with_uri("druby://192.168.1.200:6666")
puts server.echoInReverse("Was this Reversed?")
puts server.echoBack("Echo this back please")