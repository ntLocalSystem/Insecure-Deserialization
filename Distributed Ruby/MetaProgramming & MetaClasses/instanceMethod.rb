
class Person
    def initialize(pname="User")
        @name = pname
    end

    def greet
        p "Welcome, #{@name}"
    end

end

p1 = Person.new("Rohit")
p1.greet