require 'drb'

server = DRbObject.new_with_uri("druby://127.0.0.1:6666")
puts server.inspect
puts server.say_hi "Rohit"