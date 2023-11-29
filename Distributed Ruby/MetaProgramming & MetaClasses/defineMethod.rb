# defineMethod.rb

class Developer
    self.define_method(:frontend) do |name|
        p "#{name} is a frontend developer"
    end
end

d1 = Developer.new
d1.frontend "Rohit"
