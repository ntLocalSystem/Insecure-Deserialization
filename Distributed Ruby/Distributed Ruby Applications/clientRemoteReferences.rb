require 'drb'

server = DRbObject.new_with_uri("druby://127.0.0.1:6666")

# inspect
puts server.inspect
puts server.methods

greetObj = server.getReference

# Call methods
puts greetObj.greetUser "Rohit"


# Change the @ref instance variable
puts greetObj.instance_variable_get(:@ref)
newObjID = server.getObjectID
puts newObjID
greetObj.instance_variable_set('@ref', newObjID)
puts greetObj.inspect

# Call methods
puts greetObj.greetAnotherUser "Sanal"

